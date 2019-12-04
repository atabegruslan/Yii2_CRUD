<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Country;
use app\models\User;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReviewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reviews';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Review', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            
            // [
            //     'format' => 'image',
            //     'label'  => 'Image',
            //     'value'  => function ($data) { return $data->image_url; }
            // ], 
            [
                'label'     => 'Image',
                'attribute' => 'image_url',
                'format'    => 'html',
                'value'     => function ($model) { return yii\bootstrap\Html::img($model->image_url, ['width' => '150']); }
            ],
            'place',
            [
                'attribute' => 'country_id',
                'label'     => 'Country',
                'filter'    => ArrayHelper::map(Country::find()->all(), 'id', 'name'),
                'value'     => 'country.name'
            ],
            [
                'attribute' => 'user_id',
                'label'     => 'User',
                'filter'    => ArrayHelper::map(User::find()->all(), 'id', 'username'),
                'value'     => 'user.username'
            ],
            //'review',
            //'image_url:url',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
