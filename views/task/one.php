<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
//var_dump($user);
?>


<div class="tasks-form">

  <?php $form = ActiveForm::begin(); ?>
    <div class="tasks-view" style="display: flex; flex-wrap: wrap;">
        <div class="view-title"><?= $this->title ?></div>

        <div class="view-id_status">
            <div class="view-id_status_in">
                ID задачи: <?= $model->id ?></div>
            <div class="view-id_status_in">
                Статус задачи:
              <?= $form->field($model, 'status_id')->textInput(['class' => 'form-control myInput'])->label(false) ?>
            </div>
        </div>
        <div class="view-desc">
            <div class="view-desc_in">
                Описание
            </div>
          <?= $form->field($model, 'description')->textInput(['maxlength' => true, 'class' => 'form-control myInput'])->label(false) ?>
        </div>
        <div class="view-dead">
          <?= $form->field($model, 'deadline')->textInput(['class' => 'form-control myInput'])->label(false) ?>
        </div>
    </div>

    <div class="form-group">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

  <?php ActiveForm::end(); ?>

</div>
