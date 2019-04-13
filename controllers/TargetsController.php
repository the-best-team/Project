<?php

namespace app\controllers;

use app\models\tables\Status;
use Yii;
use app\models\tables\Targets;
use app\models\search\TargetsSearch;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TargetsController implements the CRUD actions for Targets model.
 */
class TargetsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
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
     * Lists all Targets models.
     * @return mixed
     */
    public function actionIndex()
    {
//        $searchModel = new TargetsSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $user = Yii::$app->user->id;

        $dataProvider = Targets::find()->where(['user_id' => Yii::$app->user->id])->with('status','tasks');
        $provider = new ActiveDataProvider([
            'query' => $dataProvider,
        ]);

//        $sqlDataProvider = new SqlDataProvider([
//            'sql' => 'SELECT targets.*, status.name as status ' .
//              'FROM targets ' .
//              'LEFT JOIN status ON(targets.status_id = status.id)' .
//                'WHERE targets.user_id=:user',
//            'params' => [':user' => $user],
//            'pagination' => [
//                'pageSize' => 5,
//            ],
//        ]);

        return $this->render('index', [
//            'searchModel' => $searchModel,
            'dataProvider' => $provider,
        ]);
    }

    /**
     * Displays a single Targets model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if(!($model->user_id == Yii::$app->user->id)) {
            throw new ForbiddenHttpException('У вас нет доступа для просмотра данной страницы!');
        }

        return $this->render('view', [
            'model' => $model,
            'hideBreadcrumbs' => true
        ]);
    }

    /**
     * Creates a new Targets model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Targets();

        $model->user_id =Yii::$app->user->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['targets/view/' . $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Targets model.
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
            return $this->redirect(['targets/view/' . $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Targets model.
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
     * Finds the Targets model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Targets the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Targets::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
