<?php

namespace app\controllers;

use app\models\AuthForm;
use app\models\tables\Users;
use app\models\Upload;
use app\models\User;
use Yii;
use app\models\tables\Tasks;
use app\models\filters\TasksFilter;
use yii\base\Event;
use yii\behaviors\TimestampBehavior;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;


/**
 * TaskController implements the CRUD actions for Tasks model.
 */
class TaskController extends Controller
{
  /**
   * {@inheritdoc}
   */

  const EVENT_TASK_CREATE_COMPLETE = 'task_create_complete';

  public function behaviors()
  {
    return [
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'delete' => ['POST'],
        ],
      ],
    ];
  }

  /**
   * Lists all Tasks models.
   * @return mixed
   */
  public function actionIndex()
  {
    $searchModel = new TasksFilter();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
    ]);
  }

  /**
   * Displays a single Tasks model.
   * @param integer $id
   * @return mixed
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionView($id)
  {
//    var_dump($model);

    return $this->render('view', [
      'model' => $this->findModel($id),
      'user' => Users::findOne(1),
    ]);
  }

  public function actionOne($id)
  {
    $model = $this->findModel($id);
    if ($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->redirect(['one', 'id' => $model->id]);
    }
    return $this->render('one', [
      'model' => $model,
//      'user' => Users::findOne(1),
    ]);
  }

  /**
   * Creates a new Tasks model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   * @return mixed
   */
  public function actionCreate()
  {
    $handler = function (Event $event) {
      if ($user = Users::findOne($event->data['responsible_id'])) {
        Yii::$app->mailer->compose()
          ->setFrom('admin@domain.com')
          ->setTo($user->login . '@domain.com')
          ->setSubject('Тема сообщения')
          ->setTextBody('Текст сообщения')
          ->setHtmlBody("<b>текст сообщения в формате HTML </b> ")
          ->send();
      }
    };

    $model = new Tasks();

    if ($model->load(Yii::$app->request->post()) && $model->save()) {

      Event::on(TaskController::class, TaskController::EVENT_TASK_CREATE_COMPLETE, $handler, $model);

      $this->trigger(static::EVENT_TASK_CREATE_COMPLETE);

      return $this->redirect(['view', 'id' => $model->id]);
    }


    return $this->render('create', [
      'model' => $model,
      'user' => Users::find()->all()
    ]);
  }

  /**
   * Updates an existing Tasks model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id
   * @return mixed
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionUpdate($id)
  {

    $model = $this->findModel($id);

    $modelU = new Upload([

    ]);

    if ($modelU->load(\Yii::$app->request->post())) {
      $modelU->file = UploadedFile::getInstance($modelU, 'file');
      $model->file = $modelU->save();
    }

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->redirect(['view', 'id' => $model->id]);
    }

    return $this->render('update', [
      'model' => $model,
      'modelU' => $modelU,
      'user' => Users::find()->all()

    ]);
  }

  /**
   * Deletes an existing Tasks model.
   * If deletion is successful, the browser will be redirected to the 'index' page.
   * @param integer $id
   * @return mixed
   * @throws NotFoundHttpException if the model cannot be found
   * @throws \Throwable
   * @throws \yii\db\StaleObjectException
   */
  public function actionDelete($id)
  {
    $this->findModel($id)->delete();

    return $this->redirect(['index']);
  }

  /**
   * Finds the Tasks model based on its primary key value.
   * If the model is not found, a 404 HTTP exception will be thrown.
   * @param integer $id
   * @return Tasks the loaded model
   * @throws NotFoundHttpException if the model cannot be found
   */
  protected function findModel($id)
  {
    if (($model = Tasks::findOne($id)) !== null) {
      return $model;
    }

    throw new NotFoundHttpException('The requested page does not exist . ');
  }
}
