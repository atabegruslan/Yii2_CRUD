<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Country;
use app\models\User;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Review */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="review-form">

    <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'],
            'enableAjaxValidation'  => true
        ]); ?>

    <?= $form->field($model, 'place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_id')->dropDownList(ArrayHelper::map(Country::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User::find()->all(), 'id', 'username')) ?>

    <?= $form->field($model, 'review')->textarea() ?>

    <?= $form->field($model, 'image_url')->fileInput() ?>

    <?= $form->field($model,'trip_start')->widget(DatePicker::className(),['clientOptions' => ['defaultDate' => '2014-01-01 12:30:30']]) ?>

    <?= $form->field($model,'trip_end')->widget(DatePicker::className(),['clientOptions' => ['defaultDate' => '2014-01-01 12:30:30']]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
