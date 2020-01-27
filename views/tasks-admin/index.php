<?php

use yii\helpers\Html;
use yii\grid\GridView;

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

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?

    echo \app\widgets\MyButton::widget();
    echo \app\widgets\MyButton::widget([
            'label' => 'не трограй',
            'attr' => 'btn-danger'
    ]);
    echo \app\widgets\MyButton::widget([
        'label' => 'Нажми скорее!',
        'attr' => 'btn-warning'
    ]);

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'мое',
                'value' => function ($model) {
                    return $model->id + 1;
                }
            ],
            'id',
            'title',
            'description',
            'creator_id',
            'responsible_id',
            //'deadline',
            //'status_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);

  /*  echo \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => 'view',
        'viewParams' => [
                'hide' => true
        ]
    ])*/
    ?>


</div>
