<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EducationCrud */

$this->title = 'Update Education: ' . ' ' . $model->institution_name;
$this->params['breadcrumbs'][] = ['label' => 'Educations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->institution_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="education-crud-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
