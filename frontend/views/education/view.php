<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Education;

/* @var $this yii\web\View */
/* @var $model common\models\EducationCrud */

$this->title = 'View :'.$model->institution_name;
$this->params['breadcrumbs'][] = ['label' => 'Educations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="education-crud-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//             'id',
//             'user_id',
            'institution_name',
            'institution_type',
            'institution_location:ntext',
            'from_date:date',
            'to_date:date',
            [
	            'label' => 'asd',
	            'value' => Education::getGraduateStatusName($model->graduated_status),
            ],
            'gpa',
            'gpa_max',
            'description:ntext',
//             'created_at',
//             'updated_at',
//             'created_by',
//             'updated_by',
        ],
    ]) ?>

</div>
