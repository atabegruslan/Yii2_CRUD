<?php
use yii\helpers\Html;
?>

<?php if (Yii::$app->session->getFlash('success')): ?>
	<p>
		<?php echo Yii::$app->session->getFlash('success'); ?>
	</p>
	<ul>
		<li><label>Title: </label><?= Html::encode($model->title) ?></li>
		<li><label>Category: </label><?= Html::encode($model->category_id) ?></li>
		<li><label>Description: </label><?= Html::encode($model->description) ?></li>
		<li><label>Image: </label><?= Html::encode($model->image) ?></li>
	</ul>
<?php endif; ?>