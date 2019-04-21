<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\tables\Status;
use \yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\tables\Targets */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="targets-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="formTarget">
        <div style="width: 52%"><?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Название') ?></div>
        <div style="width: 45%"><?= $form->field($model, 'description')->textarea(['rows' => 6])->label('Описание') ?></div>
        <div style="width: 18%; margin-top: -95px;"><?= $form->field($model, 'date_plane')->widget(\yii\jui\DatePicker::class, ['dateFormat' => 'yyyy-MM-dd',
                'language' => 'ru'])->label('Планируемая дата') ?></div>
        <div style="width: 18%; margin-top: -95px;"><?= $form->field($model, 'date_resolve')->widget(\yii\jui\DatePicker::class, ['dateFormat' => 'yyyy-MM-dd',
                'language' => 'ru'])->label('Дата выполнения') ?></div>
        <div style="width: 10%; margin-top: -95px;"><?= $form->field($model, 'status_id')->dropDownList(ArrayHelper::map(Status::find()->all(), 'id', 'name'))->label('Статус') ?></div>
        <div style="width: 45%"></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
