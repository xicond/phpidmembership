<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Education;

/* @var $this yii\web\View */
/* @var $model common\models\EducationCrud */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="education-crud-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
    	<div class="col-md-6">
    	<?= $form->field($model, 'institution_name')->textInput(['maxlength' => true]) ?>

	    <?= $form->field($model, 'institution_type')->textInput() ?>
	
	    <?= $form->field($model, 'institution_location')->textarea(['rows' => 6]) ?>
	
	    <?= $form->field($model, 'from_date')->input('date')?>
	
	    <?= $form->field($model, 'to_date')->input('date') ?>
    	</div>
    	<div class="col-md-6">
    	<?= $form->field($model, 'graduated_status')->dropDownList(Education::getListGraduateStatus()) ?>

	    <?= $form->field($model, 'gpa')->textInput(['maxlength' => true]) ?>
	
	    <?= $form->field($model, 'gpa_max')->textInput(['maxlength' => true]) ?>
	
	    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    	</div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
