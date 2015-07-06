<?php

namespace frontend\controllers;

use common\models\ProfileCrud;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;


/**
 * ProfileController shows users profiles.
 *
 *
 * @author Henry <alvin_vna@yahoo.com>
 */
class ProfileController extends Controller
{


    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    ['allow' => true, 'actions' => ['index','update-profile'], 'roles' => ['@']],
                    ['allow' => true, 'actions' => ['show'], 'roles' => ['?', '@']],
                ],
            ],
        ];
    }

    /**
     * Redirects to current user's profile.
     *
     * @return \yii\web\Response
     */
    public function actionIndex()
    {
        return $this->redirect(['show', 'id' => Yii::$app->user->getId()]);
    }

    /**
     * Shows user's profile.
     *
     * @param int $id
     *
     * @return \yii\web\Response
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionShow($id)
    {
        $profile = $this->findProfileByUserId($id);

        if ($profile === null) {
            throw new NotFoundHttpException();
        }

        return $this->render('view', [
            'profile' => $profile,
        ]);
    }

    /**
     * Updates an existing profile. 
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionUpdateProfile($id)
    {
        
        $profile = $this->findProfileByUserId($id);
        $profile->scenario = 'update';
        $this->performAjaxValidation($profile);

        if ($profile->load(Yii::$app->request->post())) {

            //$user_email = Yii::$app->user->identity->email;
            if($profile->isAttributeChanged('email')){
                if ($profile->sendEmail($profile->email,2,$profile->user_id)) {
                        Yii::$app->getSession()->setFlash('success', 'Profile berhasil diperbaharui, Mohon Lakukan verifikasi untuk alamat email baru anda.');
                    } else {
                        Yii::$app->session->setFlash('error', 'Maaf, kami tidak dapat mengirimkan email verifikasi untuk anda.');
                    }
            }
            $profile->save();

            
            Yii::$app->getSession()->setFlash('success', 'Profile berhasil diperbaharui.');
            
            return $this->refresh();
        }

        return $this->render('_form', [
            'profile' => $profile,
        ]);
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

    /**
     * Performs AJAX validation.
     *
     * @param array|Model $model
     *
     * @throws ExitException
     */
    protected function performAjaxValidation($model)
    {
        if (Yii::$app->request->isAjax && !Yii::$app->request->isPjax) {
            if ($model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                echo json_encode(ActiveForm::validate($model));
                Yii::$app->end();
            }
        }
    }


}
