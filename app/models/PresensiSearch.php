<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Presensi;

/**
 * PresensiSearch represents the model behind the search form of `app\models\Presensi`.
 */
class PresensiSearch extends Presensi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'jam_out', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['name', 'tanggal', 'jam_in', 'foto_in', 'foto_out', 'lokasi_in', 'lokasi_out', 'ketarangan_in', 'keterangan_out'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Presensi::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'tanggal' => $this->tanggal,
            'jam_out' => $this->jam_out,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'jam_in', $this->jam_in])
            ->andFilterWhere(['like', 'foto_in', $this->foto_in])
            ->andFilterWhere(['like', 'foto_out', $this->foto_out])
            ->andFilterWhere(['like', 'lokasi_in', $this->lokasi_in])
            ->andFilterWhere(['like', 'lokasi_out', $this->lokasi_out])
            ->andFilterWhere(['like', 'ketarangan_in', $this->ketarangan_in])
            ->andFilterWhere(['like', 'keterangan_out', $this->keterangan_out]);

        return $dataProvider;
    }
}
