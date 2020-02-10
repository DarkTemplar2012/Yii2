<?php


namespace app\commands;


use app\models\tables\Tasks;
use app\models\tables\Users;
use Yii;
use yii\console\Controller;
use yii\helpers\Console;

class TaskController extends Controller
{
  public function actionTask()
  {
    $task = Tasks::find()->all();
    $now = date('Y-m-d');
    foreach ($task as $key => $value) {
      if ((strtotime($now) - strtotime($task[$key]->deadline)) / 60 / 60 <= 24) {
        $user = Users::findOne($task[$key]->responsible_id);
        Yii::$app->mailer->compose()
          ->setFrom('admin@domain.com')
          ->setTo($user->login . '@domain.com')
          ->setSubject('Тема сообщения')
          ->setTextBody('Текст сообщения')
          ->setHtmlBody("<b>текст сообщения в формате HTML </b> ")
          ->send();
        echo 'success';
      }
    }
  }


}