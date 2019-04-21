<?php

namespace app\controllers;

use Yii;
use app\models\tables\Tasks;
use app\models\search\TasksSearch;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TasksController implements the CRUD actions for Tasks model.
 */
class TasksController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete', 'day'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'day'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tasks models.
     * @return mixed
     */
    public function actionIndex()
    {
//        $searchModel = new TasksSearch();

        $user = Yii::$app->user->id;

        $query = Tasks::find()->where(['user_id' => $user])->with('status', 'target', 'category');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
//            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDay($date = null) {

        if(!$date) {
            $date = date('Y-m-d');
            $model = $this->getData($date);

            return $this->render('tasks', [
                'models' => $model,
                'date' => $date,
            ]);
        } else {
             $valid = \DateTime::createFromFormat('Y-m-d', $date);
            if($valid) {
                $model = $this->getData($date);
                echo json_encode($model);
            } else echo json_encode($model = 'Incorrect date');
            exit;
        }


    }

    public function getData($date) {

        $user = Yii::$app->user->id;


        $sqlDataProvider = new SqlDataProvider([
            'sql' => 'SELECT tasks.*, categories.name as category, targets.name as target, status.name as status ' .
                'FROM tasks ' .
                'LEFT JOIN status ON(tasks.status_id = status.id )' .
                'LEFT JOIN categories ON(tasks.category_id = categories.id )' .
                'LEFT JOIN targets ON(tasks.target_id = targets.id )' .
                'WHERE tasks.user_id=:user AND tasks.date_plane=:date_plane',
            'params' => [':user' => $user, ':date_plane' => $date],
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        $model = $sqlDataProvider->getModels();

        return $model;
    }


    /**
     * Displays a single Tasks model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $data = Tasks::find()->where(['id' => $id])->with('status', 'target', 'category');
        $provider = new ActiveDataProvider([
            'query' => $data,
        ]);
        $model = $provider->getModels()[0];

//        $model = $this->findModel($id);

        if(!($model->user_id == Yii::$app->user->id)) {
            throw new ForbiddenHttpException('У вас нет доступа для просмотра данной страницы!');
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Tasks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($target = null)
    {
        $model = new Tasks();

        $model->user_id = Yii::$app->user->id;
        if($target) $model->target_id = $target;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['tasks/view/', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tasks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(!($model->user_id == Yii::$app->user->id)) {
            throw new ForbiddenHttpException('У вас нет доступа для просмотра данной страницы!');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['tasks/view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tasks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if(!($model->user_id == Yii::$app->user->id)) {
            throw new ForbiddenHttpException('У вас нет доступа для просмотра данной страницы!');
        }

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tasks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tasks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tasks::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
