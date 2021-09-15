<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PollingUnitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="polling-unit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'uniqueid') ?>

    <?= $form->field($model, 'polling_unit_id') ?>

    <?= $form->field($model, 'ward_id') ?>

    <?= $form->field($model, 'lga_id') ?>

    <?= $form->field($model, 'uniquewardid') ?>

    <?php // echo $form->field($model, 'polling_unit_number') ?>

    <?php // echo $form->field($model, 'polling_unit_name') ?>

    <?php // echo $form->field($model, 'polling_unit_description') ?>

    <?php // echo $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'long') ?>

    <?php // echo $form->field($model, 'entered_by_user') ?>

    <?php // echo $form->field($model, 'date_entered') ?>

    <?php // echo $form->field($model, 'user_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
