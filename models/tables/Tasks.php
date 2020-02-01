<?php

namespace app\models\tables;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int|null $creator_id
 * @property int|null $responsible_id
 * @property string|null $deadline
 * @property int|null $status_id
 * @property string|null $deadline_month
 */
class Tasks extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */

  public static function tableName()
  {
    return 'tasks';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['title'], 'required'],
      [['creator_id', 'responsible_id', 'status_id'], 'integer'],
      [['deadline', 'deadline_month'], 'safe'],
      [['title', 'description'], 'string', 'max' => 255],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'title' => 'Title',
      'description' => 'Description',
      'creator_id' => 'Creator ID',
      'responsible_id' => 'Responsible ID',
      'deadline' => 'Deadline',
      'status_id' => 'Status ID',
    ];
  }

  public function behaviors()
  {
    return [
      [
        'class' => TimestampBehavior::className(),
        'attributes' => [
          ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
          ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
        ],
        'value' => function () {
          return date('Y-m-d H:i:s');
        }
      ],
    ];
  }
}
