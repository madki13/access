<?php

use app\models\Presensi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PresensiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Presensis';
$this->params['breadcrumbs'][] = $this->title;


// Get the current user
$user = Yii::$app->user->identity;

// Check if the user has already absensed in
$absensedIn = Presensi::find()
    ->where(['id' => $user->id])
    ->andWhere(['tanggal' => date('Y-m-d')])
    ->andWhere(['jam_out' => null])
    ->exists();

// Set the button text
$buttonText = $absensedIn ? 'Absen Keluar' : 'Absen Masuk';
?>

<p>
    <?= Html::a('buat berita', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<div class="presensi-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            //'id',
            'name',
            'tanggal',
            'jam_in',
            'jam_out',
            'foto_in',
            'foto_out',
            'lokasi_in',
            'lokasi_out',
            'ketarangan_in',
            'keterangan_out',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Presensi $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>