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
			    'due_date' => '2020-02-23'
		    ],
		    [
			    'name' => 'Task 2',
			    'due_date' => '2020-03-01'
		    ],
		    [
			    'name' => 'Task 3',
			    'due_date' => '2020-02-28'
		    ],
		    [
			    'name' => 'Task 4',
			    'due_date' => '2020-03-07'
		    ],
		    [
			    'name' => 'Task 5',
			    'due_date' => '2020-02-21'
		    ],
		    [
			    'name' => 'Task 6',
			    'due_date' => '2020-03-10'
		    ]
	    ];

	    $this->batchInsert('{{%task}}', [
		    'name',
		    'due_date',
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
