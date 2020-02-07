<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $form yii\widgets\ActiveForm */
$arr = [];
foreach ($user as $key => $value) {
  $arr[$value->id] = $value->name;
}
?>

<div class="tasks-form">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'creator_id')->textInput()->dropDownList($arr) ?>

  <?= $form->field($model, 'responsible_id')->textInput()->dropDownList($arr) ?>

  <?= $form->field($model, 'deadline')->textInput() ?>

  <?= $form->field($model, 'status_id')->textInput() ?>

    <!--  --><? //= $form->field($modelU, 'file')->fileInput(); ?>

    <div class="form-group">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

  <?php ActiveForm::end(); ?>

</div>
