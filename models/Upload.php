<?php


namespace app\models;


use app\controllers\TaskController;
use yii\base\Model;
use yii\imagine\Image;
use yii\web\UploadedFile;

class Upload extends Model
{

  public $title;
  public $content;
  /** @var  UploadedFile */
  public $file;
  public $id;
  public $model;

  public function rules()
  {
    return [
      [['title', 'content'], 'safe'],
      ['file', 'file', 'extensions' => 'jpg, png']
    ];
  }

  public function save()
  {
//    var_dump($this->model);
    if ($this->file) {
      $filepath = \Yii::getAlias("@webroot/uploads/{$this->file->name}");
      $this->file->saveAs($filepath);

      Image::thumbnail($filepath, 100, 100)
        ->save(\Yii::getAlias("@webroot/uploads/small/{$this->file->name}"));

      return $this->file->name;
    }


  }
}