<?php
namespace app\models;
use yii\base\Model;
use yii\validators\StringValidator;

class Lesson extends Model
{
    public $name;
    public $description;
    public $order;

    public function rules()
    {
        return [
          [['name', 'description'], StringValidator::class],
          [['order'], 'safe'],
        ];
    }


    public function myValidate($attributeName, $params)
    {
        if($this->$attributeName > 10){
            $this->addError($attributeName, 'Больше 10!!!!!');
        }
    }
}