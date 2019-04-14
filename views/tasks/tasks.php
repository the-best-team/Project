<script>
    window.onload = function () {
        let button = document.getElementById('button');
        let tasksBlock = document.getElementById('js-show-tasks');
        button.addEventListener('click', function() {
            let date = document.getElementById('date').value;
            let xhr = new XMLHttpRequest();
            xhr.open('GET', '../../tasks/day/' + date, true);

            xhr.onreadystatechange = function () {
                if (xhr.readyState !== 4) {
                    return;
                };
                let data = JSON.parse(xhr.responseText);
                tasksBlock.innerHTML = '';

                if (data.length > 0) {
                    data.forEach(function (item, i) {
                        tasksBlock.innerHTML += `<a href="../../tasks/view/${item["id"]}">
                            <div class="catalog-preview" style="border: 1px #000 solid; margin: 5px; padding:5px; width: 350px">
                                <div>name: ${item["name"]}</div>
                                <div>date_plane: ${item["date_plane"]}</div>
                                <div>date_resolve: ${item["date_resolve"]}</div>
                                <div>target: ${item["target"]}</div>
                                <div>category: ${item["category"]}</div>
                                <div>status: ${item["status"]}</div>
                            </div>
                        </a>`;
                    })
                } else {
                    tasksBlock.innerHTML = `Задачи отсутствуют <br/><br/>`;
                };
            };

            xhr.send();
        });

    };

</script>

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


    <? echo \yii\jui\DatePicker::widget([
            'name' => 'date',
            'id' => 'date',
            'value' => $date,
            'dateFormat' => 'yyyy-MM-dd',
            'language' => 'ru'
    ]);
    ?>

    <input value="Посмотреть" id="button" type="button">

    <div id="js-show-tasks" >

    <?php foreach ($models as $model):?>
        <a href="../../tasks/view/<?=$model["id"]?>">
            <div class="catalog-preview" style="border: 1px #000 solid; margin: 5px; padding:5px; width: 350px">
                <div>name: <?=$model["name"]?></div>
                <div>date_plane: <?=$model["date_plane"]?></div>
                <div>date_resolve: <?=$model["date_resolve"]?></div>
                <div>target: <?=$model["target"]?></div>
                <div>category: <?=$model["category"]?></div>
                <div>status: <?=$model["status"]?></div>
             </div>
        </a>
    <?php endforeach;?>

    </div>
</div>
