<?php
namespace frontend\models;

use common\models\User;
use common\models\ProfileCrud;
use yii\base\InvalidParamException;
use yii\base\Model;
use Yii;

/**
 * Verification Email form
 */
class VerificationEmailForm extends Model
{
    public $password;

    /**
     * @var \common\models\User
     */
    private $_user;


    /**
     * Creates a form model given a token.
     *
     * @param  string                          $token
     * @param  array                           $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function __construct($token, $config = [])
    {
        if (empty($token) || !is_string($token)) {
            throw new InvalidParamException('Verification email token cannot be blank.');
        }
        $this->_user = User::findByPasswordResetToken($token);
        if (!$this->_user) {
            throw new InvalidParamException('Wrong verification email token.');
        }
        parent::__construct($config);
    }

    

    /**
     * Verification Email.
     *
     * @return boolean if password was reset.
     */
    public function verificationEmail($req)
    {
        
        $user = $this->_user;
        $user->removePasswordResetToken();
        $profile = $this->findProfileByUserId($user->id);
        if($req == 1){
            $profile->email = $user->email;         
            $profile->save();
        }else{
            $user->email = $profile->email;     
        }
        return $user->save(false);
    }


    /**
     * [findProfileByUserId description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    
    protected function findProfileByUserId($id)
    {
        if (($model = ProfileCrud::find($id)->where(['user_id' => $id])->andWhere(['created_by' => $id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
