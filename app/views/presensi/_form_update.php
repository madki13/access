<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Presensi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="presensi-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'jam_out')->textInput() ?>


    <?= $form->field($model, 'foto_out')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'lokasi_out')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'keterangan_out')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>