<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task}}`.
 */
class m200218_201258_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey()->unsigned(),
	        'name' => $this->string(255)->notNull(),
	        'due_date' => $this->date()->notNull(),
	        'completed' => $this->tinyInteger()->notNull()->defaultValue(0),
	        'user_id' => $this->integer()->defaultValue(0),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%task}}');
    }
}
