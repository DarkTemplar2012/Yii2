<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

//use nex\datepicker\DatePicker;
//use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\filters\TasksFilter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-search">

  <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
//    'options' => [
//      'class' => 'form-horizontal'
//    ]
  ]); ?>
    <span>Поиск</span>
    <div style="display: flex; flex-wrap: wrap; justify-content: space-between;">
        <div style="width: 200px">
          <?= $form->field($model, 'id') ?>
        </div>
        <div style="width: 200px">
          <?= $form->field($model, 'title') ?>
        </div>
        <div style="width: 200px">
          <?= $form->field($model, 'description') ?>
        </div>
        <div style="width: 200px">
          <?= $form->field($model, 'responsible_id') ?>
        </div>
        <div style="width: 200px">
          <?= $form->field($model, 'deadline_month')->dropDownList([
            '1' => 'Январь',
            '2' => 'Февраль',
            '3' => 'Март',
            '4' => 'Апрель',
            '5' => 'Май',
            '6' => 'Июнь',
            '7' => 'Июль',
            '8' => 'Август',
            '9' => 'Сентябрь',
            '10' => 'Октябрь',
            '11' => 'Ноябрь',
            '12' => 'Декабрь',
          ]) ?>

        </div>


    </div>


    <div class="form-group">
      <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
      <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

  <?php ActiveForm::end(); ?>

</div>
