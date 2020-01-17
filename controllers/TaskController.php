<?php

namespace app\controllers;

use app\models\Lesson;
use yii\web\Controller;

class TaskController extends Controller
{
  public function actionIndex()
  {
    $model = new Lesson();

    $model->setAttributes([
      'name' => "Lesson1",
      'description' => "dssdfsfsdsdfs",
      'order' => 12,
    ]);

    /*$model->load(
        [
            'token' => 'dkjfgkjdfklj',
            'key' => '12351251',
            'Lesson' => [
                'name' => "Lesson1",
                'description' => "dssdfsfsdsdfs",
                'order' => 12,
            ]
        ]
    );*/

    var_dump($model);
    exit;


    if (!$model->validate()) {
      var_dump($model->getErrors());
      exit();
    }

    return $this->render('index', [
      'title' => 'Hello, world',
      'content' => 'kslksdl;kdkfl;sk'
    ]);
  }

  //?r=task/one&id=1
  public function actionOne($id)
  {

  }
}