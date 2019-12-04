<?php
namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Note;

/**
 * Note controller
 */
class NoteController extends Controller
{
    public function actionCreateEntry()
    {
        $model = new Note();

        if ($model->load(Yii::$app->request->post()) && $model->validate())
        {
            Yii::$app->session->setFlash('success', 'Thank you for your post! You\'ve entered the following info: ');
            return $this->render('entry-confirm', ['model' => $model]);
        }
        else
        {
            return $this->render('entry', ['model' => $model]);
        }
    }
}
