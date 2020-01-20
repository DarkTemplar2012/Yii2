<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task}}`.
 */
class m200120_141302_create_task_table extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->createTable('tasks', [
      'id' => $this->primaryKey(),
      'title' => $this->string()->notNull(),
      'description' => $this->string(),
      'creator_id' => $this->integer(),
      'responsible_id' => $this->integer(),
      'deadline' => $this->date(),
      'status_id' => $this->integer()
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable('{{%task}}');
  }
}
