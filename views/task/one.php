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
        <div style="font-size: 3rem; width: 100%; text-align: center; padding: 5px; background-color: #a8cfff; border-radius: 5px; margin-bottom: 10px;"><?= $this->title ?></div>

        <div style="width: 100%; display: flex; justify-content: space-between;">
            <div style="width: 200px; text-align: center; padding: 5px; background-color: #a8cfff; border-radius: 5px; margin-bottom: 10px;">
                ID задачи: <?= $model->id ?></div>
            <div style="width: 200px; text-align: center; padding: 5px; background-color: #a8cfff; border-radius: 5px; margin-bottom: 10px;">
                Статус задачи:
              <?= $form->field($model, 'status_id')->textInput(['class' => 'form-control myInput'])->label(false) ?>

            </div>
        </div>
        <div style="width: 100%; text-align: center; padding: 10px 5px; background-color: #a8cfff; border-radius: 5px; margin-bottom: 10px;">
            <div style="width: 100%; margin-bottom: 20px; border-bottom: 1px solid #0b72b8; padding-bottom: 10px;">
                Описание
            </div>
          <?= $form->field($model, 'description')->textInput(['maxlength' => true, 'class' => 'form-control myInput'])->label(false) ?>


        </div>
        <div style="width: 100%; text-align: center; padding: 5px; background-color: #a8cfff; border-radius: 5px; margin-bottom: 10px; ">
          <?= $form->field($model, 'deadline')->textInput(['class' => 'form-control myInput'])->label(false) ?>

        </div>
    </div>

    <div class="form-group">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

  <?php ActiveForm::end(); ?>

</div>
