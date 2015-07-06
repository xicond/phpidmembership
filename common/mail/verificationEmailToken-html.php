<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verification-email', 'token' => $user->password_reset_token, 'req' => $tipe]);
?>
<div class="password-reset">
    <p>Hi <?= Html::encode($user->username) ?>,</p>

    <p>Follow this link to verification your email:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
