<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <!-- <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div> -->

    <div class="body-content" style="padding-top: 70px;">

        <div class="row">
            <div class="col-lg-4">
                <div class="home-thumbnail-wrapper">
                    <?= Html::img('/img/vote.png', ['alt'=>'Polling unit image', 'class'=>'home-thumbnail']);?>

                    <p><a class="btn btn-outline-secondary" href="/puresult/index">Polling Units &raquo;</a></p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="home-thumbnail-wrapper">
                    <?= Html::img('/img/chart.jpg', ['alt'=>'Total result image', 'class'=>'home-thumbnail']);?>

                    <p><a class="btn btn-outline-secondary" href="/pollingunit/index">Total Result &raquo;</a></p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="home-thumbnail-wrapper">
                    <?= Html::img('/img/monitor.jpg', ['alt'=>'New result image', 'class'=>'home-thumbnail']);?>

                    <p><a class="btn btn-outline-secondary" href="/puresult/create">New Result &raquo;</a></p>
                </div>
            </div>
        </div>

    </div>
</div>
