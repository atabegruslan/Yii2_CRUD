<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Country;
use yii\helpers\ArrayHelper;
?>
<?php $form = ActiveForm::begin([
		'options' => ['enctype' => 'multipart/form-data']
	]); ?>
	<?= $form->field($model, 'title') ?>
	<?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Country::find()->all(), 'id', 'name')) ?>
	<?= $form->field($model, 'description')->textarea() ?>
	<?= $form->field($model, 'image')->fileInput() ?>

	<div class="form-group">
		<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
	</div>
<?php $form = ActiveForm::end(); ?>
