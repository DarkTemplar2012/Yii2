<?php

use yii\helpers\Html;
use yii\widgets\ListView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\filters\TasksFilter */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
      <?= Html::a('Create Tasks', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!--  --><?php //echo $this->render('_search', ['model' => $searchModel,]); ?>
  <?php ?>
  <?= ListView::widget([
    'dataProvider' => $dataProvider,

    'options' => [
      'class' => 'row',
      'style' => [
        'margin' => 'auto',
        'padding' => '0',
        'alight-item' => 'center',
      ]
    ],
    'itemOptions' => ['class' => 'item'],
    'itemView' => function ($model, $key, $index, $widget) {
//      return ;
      return Html::a((\app\widgets\TaskPreview::widget([
        'model' => $model,
      ])), ['view', 'id' => $model->id]);
    },
  ]) ?>


</div>
