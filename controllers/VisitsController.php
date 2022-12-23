<?php

namespace app\controllers;

use app\models\Clients;
use app\models\Visits;
use app\models\search\VisitsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VisitsController implements the CRUD actions for Visits model.
 */
class VisitsController extends Controller
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
     * Lists all Visits models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'admin';
        $searchModel = new VisitsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionMy() {
        $searchModel = new VisitsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        return $this->render('my', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Visits model.
     * @param int $id_visitor Id Visitor
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_visitor)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_visitor),
        ]);
    }

    /**
     * Creates a new Visits model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Visits();

        if ($this->request->isPost) {
            $model->service_rendered = 'RENDERED';
            $model->id_client = Clients::find()->one()->id_client;
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_visitor' => $model->id_visitor]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Visits model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_visitor Id Visitor
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_visitor)
    {
        $model = $this->findModel($id_visitor);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_visitor' => $model->id_visitor]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Visits model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_visitor Id Visitor
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_visitor)
    {
        $this->findModel($id_visitor)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Visits model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_visitor Id Visitor
     * @return Visits the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_visitor)
    {
        if (($model = Visits::findOne(['id_visitor' => $id_visitor])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
