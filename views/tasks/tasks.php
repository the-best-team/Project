<script>
    window.onload = function () {
        let button = document.getElementById('btnDateToday');
        let tasksBlock = document.getElementById('js-show-tasks');
        let tableBodyData = document.getElementById('bodyTableHover');

        button.addEventListener('click', function() {
            let date = document.getElementById('date').value;
            let xhr = new XMLHttpRequest();
            xhr.open('GET', '../../tasks/day/' + date, true);

            xhr.onreadystatechange = function () {
                if (xhr.readyState !== 4) {
                    return;
                };
                let data = JSON.parse(xhr.responseText);
                tableBodyData.innerHTML = '';

                if (data.length > 0) {

                    data.forEach(function (item) {
                        tableBodyData.innerHTML += `
                            <tr>
                                <td><i class="fa fa-grav" aria-hidden="true"></i></td>
                                <td><a href="../../tasks/view/${item["id"]}">${item["name"]}</a></td>
                                <td>${item["date_plane"]}</td>
                                <td>${item["date_resolve"]}</td>
                                <td>${item["target"]}</td>
                                <td>${item["category"]}</td>
                                <td>${item["status"]}</td>
                            </tr>
                        `;
                    })
                } else {
                    tasksBlock.children[0].children[1].innerHTML = `<p>Задачи отсутствуют </p>`;
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


$this->title = 'Список задач на день';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="tasksToday">
    <h1><?= Html::encode($this->title) ?></h1>

<!--    Сегодняшняя дата, для отображения задач на этот день-->
    <h5>Выберите дату для просмотра списка задач:
    <? echo \yii\jui\DatePicker::widget([
            'name' => 'date',
            'id' => 'date',
            'value' => $date,
            'dateFormat' => 'yyyy-MM-dd',
            'language' => 'ru'
    ]);?>
        <button type="button" id="btnDateToday" class="btn btn-default">
            <i class="fa fa-play" aria-hidden="true"></i>
        </button>
    </h5>

    <div id="js-show-tasks" >

        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Название</th>
                    <th>Планируемая дата</th>
                    <th>Дата выполнения</th>
                    <th>Цель</th>
                    <th>Категория</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody class="table-hover" id="bodyTableHover">

    <?php foreach ($models as $model):?>
                <tr>
                    <td><i class="fa fa-grav" aria-hidden="true"></i></td>
                    <td><a href="../../tasks/view/<?=$model["id"]?>"><?=$model["name"]?></a></td>
                    <td><?=$model["date_plane"]?></td>
                    <td><?=$model["date_resolve"]?></td>
                    <td><?=$model["target"]?></td>
                    <td><?=$model["category"]?></td>
                    <td><?=$model["status"]?></td>
                </tr>
    <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <?= Html::a('Создать новую задачу', ['create'], ['class' => 'btn btn-success', 'style' => 'margin-bottom: 100px;']) ?>
</div>
