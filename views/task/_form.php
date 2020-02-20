<?php

use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin([
    		'options' => [
    			'class' => 'form-horizontal',
			    'enctype' => 'multipart/form-data'
		    ],
	    ]); ?>

    <?= $form->field($model, 'name')->textInput([
    		'maxlength' => true,
	        'placeholder' => 'Введите название',
	    ]) ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->id]); ?>

    <?= $form->field($model, 'due_date')->widget(DatePicker::classname(),[
//	    'model' => $model,
	    'options' => ['placeholder' => 'Выберите дату'],
	    'pluginOptions' => [
		    'startDate' => date('now'),
		    'autoclose'=>true,
		    'format' => 'yyyy-mm-dd'
	    ]
    ]); ?>

</div>
