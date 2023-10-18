<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior; // Tambahkan baris ini
use yii\db\ActiveRecord;



/**
 * This is the model class for table "presensi".
 *
 * @property int $id
 * @property string $name
 * @property string $tanggal
 * @property string $jam_in
 * @property int $jam_out
 * @property string $foto_in
 * @property string $foto_out
 * @property string $lokasi_in
 * @property string $lokasi_out
 * @property string $ketarangan_in
 * @property string $keterangan_out
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class Presensi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'presensi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'tanggal', 'jam_out', 'foto_in', 'foto_out', 'lokasi_in', 'lokasi_out', 'ketarangan_in', 'keterangan_out'], 'required'],
            [['tanggal'], 'safe'],
            [['jam_in', 'jam_out', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['name', 'foto_in', 'foto_out', 'lokasi_in', 'lokasi_out', 'ketarangan_in', 'keterangan_out'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'tanggal' => 'Tanggal',
            'jam_in' => 'Jam In',
            'jam_out' => 'Jam Out',
            'foto_in' => 'Foto In',
            'foto_out' => 'Foto Out',
            'lokasi_in' => 'Lokasi In',
            'lokasi_out' => 'Lokasi Out',
            'ketarangan_in' => 'Ketarangan In',
            'keterangan_out' => 'Keterangan Out',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'jam_in',
                ],
                'value' => function () {
                    return date('Y-m-d H:i:s');
                },
            ],
        ];
    }
}
