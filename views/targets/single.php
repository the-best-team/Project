<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 04/04/2019
 * Time: 22:12
 */

use yii\helpers\Html;
//use yii\widgets\DetailView; -- закомментила, пока не используется

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
    <div class="wrapInfo">
        <h4><?= Html::encode($this->title) ?></h4>
        <p class="cardTargetsDesc"><?= $model->description ?></p>
        <div class="dataCreateTarget"><i class="fa fa-circle-o" aria-hidden="true"></i> <?= $model->date_plane ?></div>
        <div class="dataDeadlineTarget"><i class="fa fa-bolt" aria-hidden="true"></i> <?= $model->date_resolve ?></div>
        <div class="statusTarget"><i class="fa fa-tag" aria-hidden="true"></i> <?= $model->status_id ?></div>
    </div>

    <div class="wrapButton">
        <div class="trash"><?= Html::a('<i class="fa btn-red fa-trash-o" aria-hidden="true"></i>', ['delete', 'id' => $model->id], [
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>
        <div><?= Html::a('<i class="fa btn-purple fa-pencil-square-o" aria-hidden="true"></i>', ['update', 'id' => $model->id]) ?></div>
    </div>
</div>