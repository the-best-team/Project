<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<div class="tasksView">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="cardTask">
        <p><?= $model->description ?></p>
        <div>
            <i class="fa fa-pie-chart" aria-hidden="true"></i> <span>Категория: </span> <?= $model->category["name"] ?>
        </div>
        <div>
            <i class="fa fa-rocket" aria-hidden="true" style="color: #5cb85c;"></i> <span>Цель: </span> <?= $model->target["name"] ?>
        </div>
        <div>
            <i class="fa fa-circle-o" aria-hidden="true" style="color: #f87c14;"></i> <span>Планируемая дата: </span> <?= $model->date_plane ?>
        </div>
        <div>
            <i class="fa fa-bolt" aria-hidden="true" style="color: #dc3545;"></i> <span>Дата выполнения: </span> <?= $model->date_resolve ?>
        </div>
        <div>
            <i class="fa fa-handshake-o" aria-hidden="true"></i> <span>Результат: </span> <?= $model->result ?>
        </div>
        <div>
            <i class="fa fa-tag" aria-hidden="true"></i> <span>Статус: </span> <?= $model->status["name"] ?>
        </div>

        <div class="wrapButton">
            <div class="trash"><?= Html::a('<i class="fa btn-red fa-trash-o" aria-hidden="true"></i>', ['delete', 'id' => $model["id"]], [
                    'data' => [
                        'confirm' => 'Вы уверены что хотите удалить эту задачу?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
            <div><?= Html::a('<i class="fa btn-purple fa-pencil-square-o" aria-hidden="true"></i>', ['update', 'id' => $model["id"]]) ?></div>
        </div>
    </div>
</div>
