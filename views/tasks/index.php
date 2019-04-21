<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\TasksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список всех задач';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="allTasks">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'name',
                'label' => 'Название'],
            ['attribute' => 'category.name',
                'label'=> 'Категория'],
            ['attribute' => 'target.name',
                'label' => 'Цель'],
            ['attribute' => 'date_plane',
                'label' => 'Планируемая дата'],
            ['attribute' => 'date_resolve',
                'label' => 'Дата выполнения'],
            ['attribute' => 'status.name',
                'label' => 'Статус'],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p>
        <?= Html::a('Создать новую задачу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
