<?php


namespace app\models;


use app\models\behaviors\MyBehavior;
use app\models\events\UserSuccessfullySavedEvent;
use app\models\tables\Users;
use yii\base\Model;

class AuthForm extends Model
{
  public $username;
  public $password;
  public $confirm;
  public $email;

  /*  public function behaviors()
    {
        return [
            'my' => [
                'class' => MyBehavior::class,
                'message' => 'Привет!!!'
            ]
        ];
    }
*/

  const EVENT_USER_SUCCESSFULLY_SAVED = 'event_user_successfully_saved';
  const EVENT_USER_CREATE_START = 'user_create_start';
  const EVENT_USER_CREATE_COMPLETE = 'user_create_complete';

  public function createUser()
  {
    $this->trigger(static::EVENT_USER_CREATE_START);
    echo "начало работы \<br>";
    if (!$user = Users::findOne(['login' => $this->username])) {
      echo "Пользователь найден \<br>";
      if ($this->password == $this->confirm) {
        $user = new Users([
          'name' => $this->username,
          'login' => $this->username,
          'password' => $this->password
        ]);
        $user->save();
        echo "Пользователь сохранен \<br>";
        $event = new UserSuccessfullySavedEvent(['userId' => $user->id]);
        $this->trigger(static::EVENT_USER_SUCCESSFULLY_SAVED, $event);
      }
    }
    $this->trigger(static::EVENT_USER_CREATE_COMPLETE);
    echo "Метод завершен \<br>";
  }


}