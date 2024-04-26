<?php
namespace app\models\search;

use app\models\QuanLyUser;
use yii\data\ActiveDataProvider;
use yii\base\Model;

class QuanLyUserSearch extends  QuanLyUser{
    public function rules()
    {
        return [
            [['id', 'username', 'ten', 'ten_role', 'password_hash'], 'safe']
        ];
    }
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }/**
 * Creates data provider instance with search query applied
 *
 * @param array $params
 *
 * @return ActiveDataProvider
 */
    public function search($params, $idSearch = null)
    {
        $query = QuanLyUser::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id
        ]);
        $query->andFilterWhere(['like', 'username', $this->username])
//            ->andFilterWhere(['like', 'ten_role', $this->ten_role])
            ->andFilterWhere(['like', 'ten', $this->ten]);

        return $dataProvider;
    }
}
?>



