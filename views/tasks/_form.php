<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\tables\Status;
use \yii\helpers\ArrayHelper;
use app\models\tables\Categories;
use app\models\tables\Targets;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $form yii\widgets\ActiveForm */

$params = ['prompt' => 'Выбрать'];
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="formTask">
        <div style="width: 52%"><?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Название') ?></div>
        <div style="width: 45%"><?= $form->field($model, 'description')->textarea(['rows' => 6])->label('Описание') ?></div>
        <div style="margin-top: -95px; width: 16%"><?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Categories::find()->all(), 'id', 'name'), $params)->label('Категория') ?></div>
        <div style="width: 33%; margin-top: -95px"><?= $form->field($model, 'target_id')->dropDownList(ArrayHelper::map(Targets::find()->where(['user_id' => Yii::$app->user->id])->all(), 'id', 'name'), $params)->label('Цель') ?></div>
        <div style="width: 45%"></div>
        <div style="width: 18%"><?= $form->field($model, 'date_plane')->textInput()->widget(\yii\jui\DatePicker::class, ['dateFormat' => 'yyyy-MM-dd',
                'language' => 'ru'])->label('Планируемая дата') ?></div>
        <div style="width: 18%"><?= $form->field($model, 'date_resolve')->textInput()->widget(\yii\jui\DatePicker::class, ['dateFormat' => 'yyyy-MM-dd',
                'language' => 'ru'])->label('Дата выполнения') ?></div>
        <div style="width: 10%"><?= $form->field($model, 'status_id')->dropDownList(ArrayHelper::map(Status::find()->all(), 'id', 'name'))->label('Статус') ?></div>
        <div style="width: 45%"><?= $form->field($model, 'result')->textarea(['rows' => 6])->label('Результат') ?></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
