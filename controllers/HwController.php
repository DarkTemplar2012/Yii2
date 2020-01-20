<?php

namespace app\controllers;

use yii\web\Controller;

class HwController extends Controller
{
  public function actionOne()
  {
    return $this->render('one');
  }
  
  public function actionTwo()
  {
    return $this->render('two');

  }
}