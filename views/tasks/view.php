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
<div class="tasks-view">

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
    <h3><?= $model->category["name"] ?></h3>
    <h3><?= $model->target["name"] ?></h3>
    <h3><?= $model->date_plane ?></h3>
    <h3><?= $model->date_resolve ?></h3>
    <h3><?= $model->result ?></h3>
    <h3><?= $model->status["name"] ?></h3>

<!--    --><?//= DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'id',
//            'name',
//            'description:ntext',
//            'category_id',
//            'target_id',
//            'user_id',
//            'responsible_id',
//            'date_create',
//            'date_change',
//            'date_plane',
//            'date_resolve',
//            'result:ntext',
//            'status_id',
//        ],
//    ]) ?>

</div>
