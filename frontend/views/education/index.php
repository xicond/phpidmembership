<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Education;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EducationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Educations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="education-crud-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Education', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin()?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'user_id',
            'institution_name',
            'institution_type',
            'institution_location:ntext',
            'from_date:date',
            'to_date:date',            
            [
            	'attribute' => 'graduated_status',
            	'value' => function($model){
            		return Education::getGraduateStatusName($model->graduated_status);
            	}
            ],
            'gpa',
            'gpa_max',
            'description:ntext',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end()?>

</div>
