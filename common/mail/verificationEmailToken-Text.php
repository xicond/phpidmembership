<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verification-email', 'token' => $user->password_reset_token,'req' => $tipe]);
?>
Hi <?= $user->username ?>,

Follow this link to verification your email:

<?= $resetLink ?>
