<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EducationCrud */

$this->title = 'Add Education';
$this->params['breadcrumbs'][] = ['label' => 'Educations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="education-crud-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="panel panel-default">
		<div class="panel-heading">Form Education</div>
		<div class="panel-body">
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
	    </div>
	</div>

</div>
