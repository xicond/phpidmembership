<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */

$this->title = empty($profile->fullname) ? Html::encode($profile->user->username) : Html::encode($profile->fullname);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update-profile', 'id' => Yii::$app->user->getId()], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $profile,
        'attributes' => [
            'fullname',
            'email:email',
            'gender',
            'phone',
            'address',
            'province',
            'city',
            'district',
            'subdistrict',
            'postcode',
        ],
    ]) ?>

</div>
