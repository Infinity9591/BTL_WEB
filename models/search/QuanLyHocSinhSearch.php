<?php

namespace app\models\search;

use app\models\GiaoVien;
use app\models\QuanLyGiaoVien;
use app\models\QuanLyHocSinh;
use app\models\User;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HocSinh;

class QuanLyHocSinhSearch extends QuanLyHocSinh{

    public function rules()
    {
        return [
            [['id', 'ten_lop'], 'integer'],
            [['ten', 'ngay_sinh', 'dia_chi', 'sdt_bome', 'ghi_chu',], 'safe'],
            [['toan', 'tieng_viet', 'tieng_anh'], 'number'],
            [['toan', 'tieng_viet', 'tieng_anh'], 'safe'],
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
        $query = QuanLyHocSinh::find();
        $query->where(['=', 'ten_lop', QuanLyGiaoVien::findByIdUsername(User::findIdentity(Yii::$app->user->id))->ten_lop]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
//             $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'ngay_sinh' => $this->ngay_sinh,
        ]);

        $query->andFilterWhere(['like', 'ten', $this->ten])
            ->andFilterWhere(['like', 'dia_chi', $this->dia_chi])
            ->andFilterWhere(['like', 'sdt_bome', $this->sdt_bome])
            ->andFilterWhere(['like', 'ghi_chu', $this->ghi_chu]);

        return $dataProvider;
    }

}

?>
