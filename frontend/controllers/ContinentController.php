<?php

namespace frontend\controllers;

use Yii;
use app\models\Continent;
use app\models\ContinentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ContinentCountryXref;
use yii\db\Query;

/**
 * ContinentController implements the CRUD actions for Continent model.
 */
class ContinentController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Continent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContinentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Continent model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Continent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Continent();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Continent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Continent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Continent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Continent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Continent::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionContinentsCountries()
    {
        $xrefModel = new ContinentCountryXref();

        if ($xrefModel->load(Yii::$app->request->post()) && $xrefModel->validate())
        {
            (new Query)
                ->createCommand()
                ->delete(
                    'country_continent_xref', 
                    [
                        'continent_id' => $xrefModel->continent_id, 
                        'country_id'   => $xrefModel->country_ids
                    ]
                )
                ->execute();

            $existCountryIds = (new Query())
                ->select('country_id')
                ->from('country_continent_xref')
                ->where('continent_id=' . $xrefModel->continent_id)
                ->createCommand()
                ->queryColumn();

            $countryIds = array_diff($xrefModel->country_ids, $existCountryIds);

            foreach ($countryIds as $countryId)
            {
                (new Query)
                    ->createCommand()
                    ->insert(
                        'country_continent_xref', 
                        [
                            'continent_id' => $xrefModel->continent_id,
                            'country_id'   => $countryId,
                        ]
                    )
                    ->execute();
            }

            return $this->redirect(['continents-countries']);
        }
        else
        {
            $xrefs = (new Query())
                ->select("GROUP_CONCAT(country_id) as country_ids, continent.id as continent_id, continent.name as continent_name")
                ->from('country_continent_xref')
                ->leftJoin('country', 'country.id = country_id')
                ->rightJoin('continent', 'continent.id = continent_id')
                ->groupBy('continent_id')
                ->createCommand()
                ->queryAll();

            foreach ($xrefs as &$xref) 
            {
                $xref['country_ids'] = explode(',', $xref['country_ids']);

                $selected = array();

                foreach ($xref['country_ids'] as $countryId)
                {
                    $selected[$countryId] = ['selected' => true];
                }

                $xref['country_ids'] = $selected;
            }

            return $this->render('countries', ['xrefs' => $xrefs, 'xrefModel' => $xrefModel]);
        }
    }
}
