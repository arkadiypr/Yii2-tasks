<?php

namespace app\controllers;

use Yii;
use app\models\Task;
use app\models\TaskSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;


/**
 * TaskController implements the CRUD actions for Task model.
 */
class TaskController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

	public function actionMenu()
	{
		return $this->render('menu');
	}

	public function beforeAction($action)
	{
		$user = Yii::$app->user;
		if($user->isGuest AND $this->action->id !== 'login')
		{
			$user->loginRequired();
		}
		return true;
	}

    /**
     * Lists all Task models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TaskSearch();

	    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

//	    $dataProvider = new ActiveDataProvider([
//		    'query' => \app\models\Task::find(),
//		    'pagination' => [
//			    'pageSize' => 5,
//		    ],
//		    'sort' => [
//			    'defaultOrder' => [
//				    'due_date' => SORT_DESC,
//			    ]
//		    ],
//	    ]);

	    return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Task model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Task model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Task();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Task model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Task model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Task model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Task the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Task::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

	public function actionCompleted()
	{
		if(\Yii::$app->request->isAjax){

			if (!empty($_POST)) {

				$id = $_POST['id'];
				$completed = $_POST['completed'];

				if (($model = Task::findOne($id)) !== null) {
					Yii::$app->db->createCommand()->update('task', ['completed' => $completed], "id = $id")->execute();
					$resData['success'] = 1;
					$resData['message'] = 'Данные обновлены';
				}

			} else {
				$resData['success'] = 0;
				$resData['message'] = 'Данные не приняты';
			}
		}

		echo json_encode($resData);

	}
}
