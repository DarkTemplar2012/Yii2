<?php

use yii\db\Migration;

/**
 * Class m200202_075249_alter_table_task
 */
class m200202_075249_alter_table_task extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->addColumn('tasks', 'file', $this->string());

  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropColumn('tasks', 'file');


    return false;
  }

  /*
  // Use up()/down() to run migration code without a transaction.
  public function up()
  {

  }

  public function down()
  {
      echo "m200202_075249_alter_table_task cannot be reverted.\n";

      return false;
  }
  */
}
