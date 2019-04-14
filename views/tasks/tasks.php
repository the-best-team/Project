<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\TasksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">

    <p>
        <?= Html::a('Create Tasks', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div id="js-show-tasks" ><?

    echo \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => 'single',
        'viewParams' => [
            'hideBreadcrumbs' => true,
        ]
    ]);

    ?> </div>
</div>
