<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 04/04/2019
 * Time: 22:12
 */

use yii\helpers\Html;

if(!$hideBreadcrumbs) {
    $this->params['breadcrumbs'][] = ['label' => 'Targets', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this["name"];
}
\yii\web\YiiAsset::register($this);

?>


<div class="targets-view">


    <h1><?= $model["name"] ?></h1>
    <h2><?= $model["description"] ?></h2>
    <h3><?= $model["date_plane"] ?></h3>
    <h3><?= $model["date_resolve"] ?></h3>
    <h3><?= $model["status"] ?></h3>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model["id"]], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model["id"]], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>




</div>