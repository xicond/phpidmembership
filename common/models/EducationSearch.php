<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EducationCrud;

/**
 * EducationSearch represents the model behind the search form about `common\models\EducationCrud`.
 */
class EducationSearch extends EducationCrud
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'institution_type', 'graduated_status', 'created_by', 'updated_by'], 'integer'],
            [['institution_name', 'institution_location', 'from_date', 'to_date', 'description', 'created_at', 'updated_at'], 'safe'],
            [['gpa', 'gpa_max'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchByUserId($params)
    {
        $query = EducationCrud::find();
        $query->where(['user_id'=>Yii::$app->user->getId()]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
        	$query->where(['user_id'=>Yii::$app->user->getId()]);
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            //'user_id' => $this->user_id,
            'institution_type' => $this->institution_type,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'graduated_status' => $this->graduated_status,
            'gpa' => $this->gpa,
            'gpa_max' => $this->gpa_max,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'institution_name', $this->institution_name])
            ->andFilterWhere(['like', 'institution_location', $this->institution_location])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
