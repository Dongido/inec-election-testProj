<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AnnouncedPuResults */

$this->title = 'Store Polling Unit Results';
$this->params['breadcrumbs'][] = ['label' => 'Polling Unit', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="announced-pu-results-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
