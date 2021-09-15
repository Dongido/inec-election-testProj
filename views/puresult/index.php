<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\PollingUnit;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AnnouncedPuResultsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Polling Unit Results';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="announced-pu-results-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add New Result', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'result_id',
            [
                'label' => 'Polling Unit',
                'attribute' => 'polling_unit_uniqueid',
                'value' => function($searchModel){
                    $pu = PollingUnit::find()->where(['uniqueid'=> $searchModel->polling_unit_uniqueid])->one();
                    return $pu->polling_unit_name ?? '';
                },
            ],
            //'polling_unit_uniqueid',
            'party_abbreviation',
            'party_score',
            'entered_by_user',
            //'date_entered',
            //'user_ip_address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
