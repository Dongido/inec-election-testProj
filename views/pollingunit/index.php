<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\PollingUnit;
use app\models\Lga;
use app\models\AnnouncedPuResults;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PollingUnitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Polling Units';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="polling-unit-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Polling Unit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showPageSummary' => true,

        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            ['class' => 'kartik\grid\SerialColumn'],

            [
                'attribute' => 'lga_id',
                'value' => function($searchModel){
                    $lga = Lga::find()->where(['uniqueid'=> $searchModel->lga_id])->one();
                    return $lga->lga_name ?? '';
                },
                'filter' => Html::activeDropDownList($searchModel, 'lga_id', ArrayHelper::map(Lga::find()->orderBy('lga_name')->asArray()->all(), 'lga_id', 'lga_name'),['class'=>'form-control','prompt'=>'Select LGA']),
            ],
            'polling_unit_number',
            'ward_id',
            
            'polling_unit_name',
            [
                'label' => 'Result',
                'attribute' => 'party_score',
                'value' => function(){
                    $lga = AnnouncedPuResults::find()->joinWith('pollingunitresult')->one();
                    return $lga->party_score;
                },
                'pageSummary' => true,

            ],

            //'polling_unit_description:ntext',
            //'lat',
            //'long',
            //'entered_by_user',
            //'date_entered',
            //'user_ip_address',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
