<?php

namespace common\models;

use yii\db\Expression;
use common\models\Profile;
use common\models\User;

class ProfileCrud extends Profile
{
    public function behaviors()
    {
         return [
            [
                'class' => 'yii\behaviors\TimestampBehavior',
                'value' => new Expression('NOW()'),
            ],
            'yii\behaviors\BlameableBehavior'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
       return [

            [['user_id', 'fullname','email'], 'required','on' => 'update'],
            [['user_id', 'province', 'gender', 'city', 'district', 'subdistrict', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['fullname', 'email', 'phone'], 'string', 'max' => 150],
            [['gender'], 'integer', 'max' => 255],
            [['address'], 'string', 'max' => 250],
            [['postcode'], 'string', 'max' => 6],
            [['user_id','email'], 'unique'],
            [['email'], 'email','on' => 'update'],
            [['user_id', 'fullname'], 'required', 'on' => 'signup'],

        ];
    }

    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'fullname' => 'Nama Lengkap',
            'gender' => 'Jenis Kelamin',
            'email' => 'Email',
            'phone' => 'Telepon',
            'address' => 'Alamat',
            'province' => 'Propinsi',
            'city' => 'Kota',
            'district' => 'Kelurahan',
            'subdistrict' => 'Kecamatan',
            'postcode' => 'Kode Pos',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By'
        ];
    }


     /**
     * Check status verified
     * @param  [type] $user_id [description]
     * @return [type]       [description]
     */
    function statusVerified($user_id) {

        $profile = static::findOne(['user_id' => $user_id, 'created_by' => $user_id]);

        $user = User::findIdentity($user_id);

        if($profile->email != $user->email){
            $email = $profile->email . ' <span class="label label-warning">Not Verified</span>';
        }elseif($profile->email === $user->email){
            $email = $profile->email . ' <span class="label label-success">Verified</span>';
        }

        return $email;
         
    }


    /**
     * Sends an email with a link, for verification.
     * @param  [type] $email   [description]
     * @param  [type] $tipe    [description]
     * @param  [type] $user_id [description]
     * @return [type]          [description]
     */
    public function sendEmail($email,$tipe,$user_id = null)
    {
        /* @var $user User */
        if(!is_null($user_id)){
            $user = User::findOne([
                'status' => User::STATUS_ACTIVE,
                'id' => $user_id,
            ]);
        }else{
            $user = User::findOne([
                'status' => User::STATUS_ACTIVE,
                'email' => $email,
            ]);
        }
        


        if ($user) {
            if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
                $user->generatePasswordResetToken();
            }

            if ($user->save()) {
                return \Yii::$app->mailer->compose(['html' => 'verificationEmailToken-html', 'text' => 'verificationEmailToken-text'], ['user' => $user,'tipe'=>$tipe])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name])
                    ->setTo($email)
                    ->setSubject('Verification email for ' . \Yii::$app->name)
                    ->send();
            }
        }

        return false;
    }

    
}
