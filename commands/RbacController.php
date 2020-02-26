<?php


namespace app\commands;

use app\models\tables\Users;
use yii\console\Controller;

class RbacController extends Controller
{
  public function actionIndex()
  {
    $am = \Yii::$app->authManager;

    $permissionTaskCreate = $am->createPermission('TaskCreate');
    $permissionTaskUpdate = $am->createPermission('TaskUpdate');
    $permissionTaskDelete = $am->createPermission('TaskDelete');
    $permissionTaskView = $am->createPermission('TaskView');

    $am->add($permissionTaskCreate);
    $am->add($permissionTaskUpdate);
    $am->add($permissionTaskDelete);
    $am->add($permissionTaskView);


    $admin = $am->createRole("admin");
    $moder = $am->createRole("moder");

    $am->add($admin);
    $am->add($moder);

    $am->addChild($admin, $permissionTaskCreate);
    $am->addChild($admin, $permissionTaskUpdate);
    $am->addChild($admin, $permissionTaskDelete);
    $am->addChild($admin, $permissionTaskView);

    $am->addChild($moder, $permissionTaskCreate);
    $am->addChild($moder, $permissionTaskUpdate);
    $am->addChild($moder, $permissionTaskView);


    $am->assign($admin, 1);


    $user = Users::find()->all();
    foreach ($user as $usr) {
      $am->assign($moder, $usr['id']);
    }
  }
}
