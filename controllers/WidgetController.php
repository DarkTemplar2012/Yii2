<?php


namespace app\controllers;


use app\models\Lesson;
use yii\web\Controller;

class WidgetController extends Controller
{
    public function actionIndex()
    {
        var_dump(\Yii::$app->request->post()); exit;
        $model = new Lesson();
        return $this->render('index', ['model' => $model]);
    }
}