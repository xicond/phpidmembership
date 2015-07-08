<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Experience */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="experience-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <?= $form->field($model, 'start_date')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '99-99-9999', 'type' => 'date','options'=>['value'=>date('d-m-Y',strtotime($model->start_date)),'class'=>'form-control']]) ?>

    <?= $form->field($model, 'end_date')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '99-99-9999', 'type' => 'date','options'=>['value'=>date('d-m-Y',strtotime($model->end_date)),'class'=>'form-control']]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
