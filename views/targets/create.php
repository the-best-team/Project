<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Targets */

$this->title = 'Новая цель';
$this->params['breadcrumbs'][] = ['label' => 'Targets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="targets-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
