<?php
namespace app\models\search;

use app\models\QuanLyGiaoVien;
use yii\data\ActiveDataProvider;
use yii\base\Model;

class QuanLyGiaoVienSearch extends QuanLyGiaoVien{
    public function rules()
    {
        return [
            [['id', 'username', 'ten', 'ten_lop', 'ten_mon', 'ten_role', 'trang_thai'], 'safe'],
            [['dia_chi', 'sdt', 'ngay_sinh'], 'safe']
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
        $query = QuanLyGiaoVien::find();

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
            ->andFilterWhere(['like', 'ten', $this->ten])
//            ->andFilterWhere(['like', 'ngay_sinh', $this->parent])
//            ->andFilterWhere(['like', 'dia_chi', $this->dia_chi])
//            ->andFilterWhere(['like', 'sdt', $this->username])
            ->andFilterWhere(['like', 'ten_lop', $this->ten_lop])
            ->andFilterWhere(['like', 'ten_mon', $this->ten_mon])
            ->andFilterWhere(['like', 'ten_role', $this->ten_role])
            ->andFilterWhere(['like', 'trang_thai', $this->trang_thai]);

        return $dataProvider;
    }
}
?>
