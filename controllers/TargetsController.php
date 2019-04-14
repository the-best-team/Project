<?php

namespace app\controllers;

use Yii;
use app\models\tables\Targets;
<<<<<<< Updated upstream
use app\models\tables\TargetsSearch;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
=======
use app\models\search\TargetsSearch;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
        $searchModel = new TargetsSearch();
=======
//        $searchModel = new TargetsSearch();
>>>>>>> Stashed changes
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $query = Targets::find()->where(['user_id' => Yii::$app->user->id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        return $this->render('index', [
<<<<<<< Updated upstream
            'searchModel' => $searchModel,
=======
//            'searchModel' => $searchModel,
>>>>>>> Stashed changes
            'dataProvider' => $dataProvider,
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
<<<<<<< Updated upstream
        return $this->render('view', [
            'model' => $this->findModel($id),
=======
        $model = $this->findModel($id);

        if(!($model->user_id == Yii::$app->user->id)) {
            throw new ForbiddenHttpException('У вас нет доступа для просмотра данной страницы!');
        }

        return $this->render('view', [
            'model' => $model,
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
=======
        if(!($model->user_id == Yii::$app->user->id)) {
            throw new ForbiddenHttpException('У вас нет доступа для просмотра данной страницы!');
        }

>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
        $this->findModel($id)->delete();
=======
        $model = $this->findModel($id);

        if(!($model->user_id == Yii::$app->user->id)) {
            throw new ForbiddenHttpException('У вас нет доступа для просмотра данной страницы!');
        }

        $model->delete();
>>>>>>> Stashed changes

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
