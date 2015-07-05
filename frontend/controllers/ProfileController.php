<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use common\models\Profile;

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
                    ['allow' => true, 'actions' => ['index'], 'roles' => ['@']],
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
     * [findProfileByUserId description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    
    protected function findProfileByUserId($id)
    {
        if (($model = Profile::find($id)->where(['user_id' => $id])->andWhere(['created_by' => $id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
