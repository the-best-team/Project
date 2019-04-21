<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Targets */

$this->title = $model->name;
if(!$hideBreadcrumbs) {
    $this->params['breadcrumbs'][] = ['label' => 'Targets', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
}
\yii\web\YiiAsset::register($this);

?>
<div class="targetsView">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="cardTargetSingle">
        <p><?= $model->description ?></p>

        <div>
            <i class="fa fa-circle-o" aria-hidden="true" style="color: #f87c14;"></i> <span>Планируемая дата: </span> <?= $model->date_plane ?>
        </div>
        <div>
            <i class="fa fa-bolt" aria-hidden="true" style="color: #dc3545;"></i> <span>Дата выполнения: </span> <?= $model->date_resolve ?>
        </div>
        <div>
            <i class="fa fa-tag" aria-hidden="true"></i> <span>Статус: </span> <?= $model->status["name"] ?>
        </div>

        <?php foreach ($model->tasks as $task):?>
            <a href="../../tasks/view/<?=$task["id"]?>">
                <div class="catalog-preview" style=" margin: 5px; padding:1px; width: 150px">
                    <div><?=$task["name"]?></div>
                    <!--                <div>Status: --><?//=$task["user_id"]?><!--</div>-->
                </div>
            </a>
        <?php endforeach;?>

        <p style="margin: 30px 0 !important; ">
            <?= Html::a('Создать новую задачу', ['tasks/create'], ['class' => 'btn btn-success']) ?>
        </p>

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
