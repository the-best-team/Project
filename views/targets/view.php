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
<div class="targets-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <h1><?= $model->name ?></h1>
    <h2><?= $model->description ?></h2>
    <h3><?= $model->date_plane ?></h3>
    <h3><?= $model->date_resolve ?></h3>
    <h3><?= $model->status["name"] ?></h3>

    <?php foreach ($model->tasks as $task):?>
        <a href="../../tasks/view/<?=$task["id"]?>">
            <div class="catalog-preview" style="border: 1px #000 solid; margin: 5px; padding:5px; width: 150px">
                <div><?=$task["name"]?></div>
                <div>Status: <?=$task["user_id"]?></div>
            </div>
        </a>
    <?php endforeach;?>

    <p>
        <?= Html::a('New task', ['tasks/create'], ['class' => 'btn btn-primary']) ?>
    </p>


</div>
