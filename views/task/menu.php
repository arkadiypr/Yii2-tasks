<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */

$this->title = 'Menu';
?>
<div class="container-fluid">
	<div class="row" style="margin-top: 100px">
		<div class="col-md-offset-5">
			<p>
				<?= Html::a('Add New Task', ['create'], ['style' => [
					'text-decoration' => 'underline'
				]]) ?>
			</p>
			<p>
				<?= Html::a('View Tasks', ['index'], ['style' => [
					'text-decoration' => 'underline'
				]]) ?>
			</p>
		</div>
	</div>
</div>