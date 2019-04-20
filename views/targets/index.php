<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\tables\TargetsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Цели';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="targets-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новую цель', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?

    echo \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => 'single',
            'viewParams' => [
                'hideBreadcrumbs' => true,
            ]
        ]);
    ?>
</div>
