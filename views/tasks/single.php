<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 04/04/2019
 * Time: 22:12
 */

use yii\helpers\Html;

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
    <h2><?= $model->description ?></h2>
    <h3><?= $model->category_id ?></h3>
    <h3><?= $model->target_id ?></h3>
    <h3><?= $model->date_plane ?></h3>
    <h3><?= $model->date_resolve ?></h3>
    <h3><?= $model->result ?></h3>
    <h3><?= $model->status_id ?></h3>

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




</div>