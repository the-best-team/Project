<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/03/2019
 * Time: 12:07
 */

namespace app\controllers;


use yii\web\Controller;

class TaskController extends Controller
{

//    public $layout = false;

    public function actionIndex() {

//        var_dump(\Yii::$app->request->get('id'));

        return $this->render('single', [
            'title' => "Yii2",
            'content' => "Single task"
        ]);
    }
}