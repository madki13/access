<?php

use app\models\presensi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\presensiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'admin';
$this->params['breadcrumbs'][] = ['label' => 'presensi', 'url' => ['/presensi']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presensi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('buat presensi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama:ntext',
            'presensi',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, presensi $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>