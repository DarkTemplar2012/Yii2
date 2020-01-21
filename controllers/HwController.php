<?php

namespace app\controllers;

use app\models\tables\Tasks;
use app\models\tables\Users;
use yii\web\Controller;

class HwController extends Controller
{
  public function actionIndex()
  {
    /* \Yii::$app->db->createCommand("
         CREATE TABLE test (
           id INT PRIMARY KEY AUTO_INCREMENT,
           title VARCHAR(50),
           content VARCHAR(255)
         );
     ")->execute();*/


    /**/


    /* $result = \Yii::$app->db->createCommand("
     SELECT COUNT(*) FROM test
    ")->queryScalar();
*/
    $id = 2;
    $result = \Yii::$app->db->createCommand("
        SELECT * FROM tasks WHERE id = :id
        ")->bindValues([
      ':id' => $id
    ])->queryOne();
    var_dump($result);

    echo "complete";
    exit;
  }

  public function actionAr()
  {
    $task = new Tasks([
      'title' => 'Закомство с Йии',
      'description' => 'Установить фреймворк'
    ]);
    $task->creator_id = 1;
    $task->responsible_id = 2;
    $task->deadline = date("Y-m-d");
    $task->status_id = 1;

    $task->save();

    //$task = Tasks::findOne(['title' => 'Task 3']);
    //$result = Tasks::find()->all();

    /*$result = Tasks::findOne(2);
    $result->title = "Task 2 changed";
    $result->save();*/


    /*$result = Tasks::findOne(2);
    $result->delete();*/

    /*
         $result = Tasks::find()
        ->select(['id', 'title'])
        ->where(['>', 'id', 2])
        ->all();
    */

    $result = Tasks::findOne(3);
    echo "complete";
    exit;
    var_dump($result->status);
  }

  public function actionUserar()
  {
    $user = new Users([
      'name' => 'Вася',
      'login' => 'Vasya',
      'password' => '1234',
      'date_reg' => date("Y-m-d"),
      'role' => 1,
    ]);

    $user->save();
  }
}