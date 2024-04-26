<?php

namespace app\models\search;

use app\models\GiaoVien;
use app\models\QuanLyGiaoVien;
use app\models\QuanLyChiTietDiemHocSinh;
use app\models\User;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HocSinh;

class QuanLyChiTietDiemHocSinhSearch extends QuanLyChiTietDiemHocSinh {
    public function rules()
    {
        return [
            [['id','ten', 'ten_lop', 'diem_cuoi_ky_1_toan', 'diem_cuoi_ky_2_toan', 'diem_giua_ky_1_tv', 'diem_cuoi_ky_1_tv', 'diem_giua_ky_2_tv', 'diem_cuoi_ky_2_tv', 'diem_cuoi_ky_1_ta', 'diem_cuoi_ky_2_ta', 'toan', 'tieng_viet', 'tieng_anh', 'xep_loai','diem_giua_ky_1_toan', 'diem_giua_ky_2_toan' ], 'safe']
        ];
    }

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
        $query = QuanLyChiTietDiemHocSinh::find();
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
        ]);

        $query->andFilterWhere(['like', 'ten', $this->ten]);

        return $dataProvider;
    }

}
