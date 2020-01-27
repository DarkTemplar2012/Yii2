<?php

use yii\db\Migration;

/**
 * Class m200126_094919_alter_tasks_table
 */
class m200126_094919_alter_tasks_table extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->addColumn('tasks', 'created_at', $this->timestamp()->notNull()->defaultValue('0000-00-00 00:00:00'));
    $this->addColumn('tasks', 'updated_at', $this->timestamp()->notNull()->defaultValue('0000-00-00 00:00:00'));
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropColumn('tasks', 'created_at');
    $this->dropColumn('tasks', 'updated_at');

  }

  /*
  // Use up()/down() to run migration code without a transaction.
  public function up()
  {

  }

  public function down()
  {
      echo "m200126_094919_alter_tasks_table cannot be reverted.\n";

      return false;
  }
  */
}
