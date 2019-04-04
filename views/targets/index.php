<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\tables\TargetsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Targets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="targets-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Targets', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?
//    echo GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
////            'id',
//            'name',
//            'description:ntext',
////            'user_id',
////            'date_create',
//            //'date_change',
//            'date_plane',
//            'date_resolve',
//            'status_id',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]);

    echo \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => 'single',
            'viewParams' => [
                'hideBreadcrumbs' => true,
            ]
        ]);
  ?>
</div>
