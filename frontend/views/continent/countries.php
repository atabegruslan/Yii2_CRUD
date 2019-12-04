<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Country;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
?>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">

<table class="table">
	<thead>
		<tr>
			<th width="20%">Continent</th>
			<th width="60%">Countries</th>
			<th width="20%"></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($xrefs as $xref): ?>
			<tr>
				<div class="continent-country-form">
					<?php $form = ActiveForm::begin(); ?>
						<td width="20%">
							<?php echo $xref['continent_name']; ?>
							<?= 
								$form
									->field($xrefModel, "continent_id")
									->hiddenInput(['value'=> $xref['continent_id']])
									->label(false); 
							?>
						</td>
						<td width="60%">
    						<?= 
    							$form
    								->field($xrefModel, 'country_ids[]')
    								->dropDownList(
    									ArrayHelper::map(
    										Country::find()->all(), 
    										'id', 
    										'name'
    									), 
    									[
    										'multiple' =>'multiple', 
    										'class'    => 'custom-select',
    										'options'  => $xref['country_ids']
    									]
    								)
    								->label(false); 
    						?>
						</td>
						<td width="20%">
						    <div class="form-group">
						        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
						    </div>
						</td>
					<?php ActiveForm::end(); ?>
				</div>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>

<script type="text/javascript">
	(function($) {
	    $(document).ready(function() {
			$('select').select2();
	    });
	})(jQuery);
</script>