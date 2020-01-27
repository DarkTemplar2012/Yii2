<?php


namespace app\controllers;


use app\models\AuthForm;
use app\models\behaviors\MyBehavior;
use yii\base\Event;
use yii\web\Controller;

class EventController extends Controller
{
  public function actionIndex()
  {
    $model = new AuthForm([
      'username' => 'Pupkin' . rand(),
      'password' => 'qwerty',
      'confirm' => 'qwerty'
    ]);

    $handler = function (Event $event) {
//            var_dump($event);
      echo "Пользователь {} подписан на рассылку!!!!";

    };
    //$model->on(AuthForm::EVENT_USER_SUCCESSFULLY_SAVED, $handler);
    Event::on(AuthForm::class, AuthForm::EVENT_USER_SUCCESSFULLY_SAVED, $handler);

    $model->createUser();
    exit;
  }

  public function actionTest()
  {
    $model = new AuthForm([
      'username' => 'Pupkin' . rand(),
      'password' => 'qwerty',
      'confirm' => 'qwerty'
    ]);

    $model->attachBehavior('my', [
      'class' => MyBehavior::class
    ]);

    $model->detachBehavior('my');

    $model->sendMessage();
    exit;
    // $model->createUser();
  }
}