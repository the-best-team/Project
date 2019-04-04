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

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

<!--    --><?//= $form->field($model, 'user_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'date_create')->textInput() ?>

<!--    --><?//= $form->field($model, 'date_change')->textInput() ?>

    <?= $form->field($model, 'date_plane')->widget(\yii\jui\DatePicker::class, ['dateFormat' => 'yyyy-MM-dd',
        'language' => 'ru']) ?>
    <?= $form->field($model, 'date_resolve')->widget(\yii\jui\DatePicker::class, ['dateFormat' => 'yyyy-MM-dd',
        'language' => 'ru']) ?>

    <?= $form->field($model, 'status_id')->dropDownList(ArrayHelper::map(Status::find()->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
