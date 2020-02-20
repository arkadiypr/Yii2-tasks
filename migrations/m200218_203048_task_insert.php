<?php

use yii\db\Migration;

/**
 * Class m200218_203048_task_insert
 */
class m200218_203048_task_insert extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    	$insert = [
    		[
    			'name' => 'Task 1',
			    'due_date' => '2020-02-23',
			    'user_id' => '1'
		    ],
		    [
			    'name' => 'Task 2',
			    'due_date' => '2020-03-01',
			    'user_id' => '1'
		    ],
		    [
			    'name' => 'Task 3',
			    'due_date' => '2020-02-28',
			    'user_id' => '1'
		    ],
		    [
			    'name' => 'Task 4',
			    'due_date' => '2020-03-07',
			    'user_id' => '1'
		    ],
		    [
			    'name' => 'Task 5',
			    'due_date' => '2020-02-21',
			    'user_id' => '1'
		    ],
		    [
			    'name' => 'Task 6',
			    'due_date' => '2020-03-10',
			    'user_id' => '1'
		    ]
	    ];

	    $this->batchInsert('{{%task}}', [
		    'name',
		    'due_date',
		    'user_id'
	    ], $insert);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    $this->truncateTable('{{%task}}');
    }
}
