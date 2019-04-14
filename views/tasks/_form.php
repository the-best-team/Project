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
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Categories::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'target_id')->dropDownList(ArrayHelper::map(Targets::find()->where(['user_id' => Yii::$app->user->id])->all(), 'id', 'name')) ?>

<!--    --><?//= $form->field($model, 'user_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'responsible_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'date_create')->textInput() ?>

<!--    --><?//= $form->field($model, 'date_change')->textInput() ?>

    <?= $form->field($model, 'date_plane')->textInput()->widget(\yii\jui\DatePicker::class, ['dateFormat' => 'yyyy-MM-dd',
        'language' => 'ru']) ?>

    <?= $form->field($model, 'date_resolve')->textInput()->widget(\yii\jui\DatePicker::class, ['dateFormat' => 'yyyy-MM-dd',
        'language' => 'ru']) ?>

    <?= $form->field($model, 'result')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status_id')->dropDownList(ArrayHelper::map(Status::find()->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
