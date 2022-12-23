<?php

namespace app\controllers;

use app\models\GroupServices;
use app\models\search\GroupServicesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GroupServicesController implements the CRUD actions for GroupServices model.
 */
class GroupServicesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all GroupServices models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'admin';
        $searchModel = new GroupServicesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GroupServices model.
     * @param int $id_group_services Id Group Services
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_group_services)
    {
        $this->layout = 'admin';
        return $this->render('view', [
            'model' => $this->findModel($id_group_services),
        ]);
    }

    /**
     * Creates a new GroupServices model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout = 'admin';
        $model = new GroupServices();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_group_services' => $model->id_group_services]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing GroupServices model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_group_services Id Group Services
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_group_services)
    {
        $this->layout = 'admin';
        $model = $this->findModel($id_group_services);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_group_services' => $model->id_group_services]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GroupServices model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_group_services Id Group Services
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_group_services)
    {
        $this->findModel($id_group_services)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GroupServices model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_group_services Id Group Services
     * @return GroupServices the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_group_services)
    {
        if (($model = GroupServices::findOne(['id_group_services' => $id_group_services])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
