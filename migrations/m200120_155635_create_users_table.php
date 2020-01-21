<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m200120_155635_create_users_table extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->createTable('{{%users}}', [
      'id' => $this->primaryKey(),
      'name' => $this->string()->notNull(),
      'login' => $this->string()->notNull(),
      'password' => $this->string()->notNull(),
      'date_reg' => $this->date(),
      'role' => $this->integer(),
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable('{{%users}}');
  }
}
