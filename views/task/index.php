<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>

	<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
	    'layout' => "{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

	        [
            'attribute' => 'name',
            'value' => function (\app\models\Task $model) {
                return Html::a(Html::encode($model->name), ['update', 'id' => $model->id]);
            },
            'format' => 'raw',
	        ],

	        [
		        'attribute' => 'due_date',
		        'filter' => false,
		        'format' => ['date', 'php:d/m/Y']
	        ],
	        [
		        'attribute' => 'completed',
		        'filter' => false,
		        'content' => function($model){
			        return ($model->completed == 0)
				        ?
					        Html::checkbox('completed', false, ['id' => 'is-completed', 'data-id' => $model->id])
				        :
					        Html::checkbox('completed', true, ['id' => 'is-completed', 'data-id' => $model->id]);
		        }
	        ],
	        [
		        'filter' => false,
		        'value' => function (\app\models\Task $model) {
			        return Html::a('View', ['view', 'id' => $model->id]);
		        },
		        'format' => 'raw',
	        ],
        ],
    ]); ?>

	<?php
	$js = <<<JS
	$(document).on('change', '#is-completed', function(){
        var id = $(this).data('id');
        if (this.checked) {
        var data = {completed:1, id: id};
        } else {
        var data = {completed:0, id: id};
        }
        
        console.log(data);
        
        $.ajax({
            url: '/task/completed',
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(data){
                if (data['success']) {
                    alert(data['message']);
                    document.location = '/task';
                } else {
                    alert(data['message']);
                }
            }
        });
    });
JS;

	$this->registerJs($js);
	?>

</div>
