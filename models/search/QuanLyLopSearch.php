<?php
namespace app\models\search;

use app\models\QuanLyLop;
use yii\data\ActiveDataProvider;
use yii\base\Model;

class QuanLyLopSearch extends QuanLyLop{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['ten_lop'], 'safe'],
            [['so_hoc_sinh'], 'integer'],
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
    public function search($params, $idSearch = null)
    {
        $query = QuanLyLop::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5
            ]
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
        $query->andFilterWhere(['like', 'ten_lop', $this->ten_lop]);

        return $dataProvider;
    }
}

?>
