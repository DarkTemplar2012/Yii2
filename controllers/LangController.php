<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class LangController extends Controller
{

  public function actionIndex($lng)
  {
    session_start();
    $_SESSION["lang"] = $lng;
    $this->redirect(Yii::$app->request->referrer);
  }


}
