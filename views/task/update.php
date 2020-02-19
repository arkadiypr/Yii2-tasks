<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Task */

$this->title = 'Update Task: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="task-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

	<?= $this->render('_button_update_task') ?>

	<?php ActiveForm::end(); ?>


</div>
<p>
	<?= Html::a('Delete', ['delete', 'id' => $model->id], [
		'class' => 'btn btn-danger',
		'data' => [
			'confirm' => 'Are you sure?',
			'method' => 'post',
		],
	]) ?>
</p>
