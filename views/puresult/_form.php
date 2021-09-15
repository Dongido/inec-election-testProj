<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PollingUnit;
use app\models\Party;

/* @var $this yii\web\View */
/* @var $model app\models\AnnouncedPuResults */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="announced-pu-results-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
        $pu=PollingUnit::find()->select(['uniqueid','polling_unit_name'])->all();
        $puData=ArrayHelper::map($pu,'uniqueid','polling_unit_name'); 

        $pt=Party::find()->select(['partyid','partyname'])->all();
        $ptData=ArrayHelper::map($pt,'partyid','partyname'); 
    ?>

    <?= $form->field($model, 'polling_unit_uniqueid')->dropDownList($puData,['prompt'=>'-- Select Polling Unit --']) ?>

    <?= $form->field($model, 'party_abbreviation')->dropDownList($ptData,['prompt'=>'-- Select Party --'])->label('Party') ?>

    <?= $form->field($model, 'party_score')->textInput() ?>

    <?= $form->field($model, 'entered_by_user')->textInput(['maxlength' => true]) ?>

    

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
