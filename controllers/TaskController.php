<?php

namespace app\controllers;

use app\models\Lesson;
use app\models\tables\Tasks;
use yii\web\Controller;

class TaskController extends Controller
{
  public function actionIndex()
  {
//    $task = new Tasks;
    $result = Tasks::find()->all();
//    var_dump($result[0]->title);
//    exit;
    return $this->render('index', [
      'data' => $result,
    ]);
  }


}