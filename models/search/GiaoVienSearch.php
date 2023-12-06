<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GiaoVien;

/**
 * GiaoVienSearch represents the model behind the search form about `app\models\GiaoVien`.
 */
class GiaoVienSearch extends GiaoVien
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ma_mon', 'ma_lop'], 'integer'],
            [['ten', 'ngay_sinh', 'dia_chi', 'sdt'], 'safe'],
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
    public function search($params)
    {
        $query = GiaoVien::find();

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
            'id' => $this->id,
            'ngay_sinh' => $this->ngay_sinh,
            'ma_mon' => $this->ma_mon,
            'ma_lop' => $this->ma_lop,
        ]);

        $query->andFilterWhere(['like', 'ten', $this->ten])
            ->andFilterWhere(['like', 'dia_chi', $this->dia_chi])
            ->andFilterWhere(['like', 'sdt', $this->sdt]);

        return $dataProvider;
    }
}
