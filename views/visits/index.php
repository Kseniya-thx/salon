<?php

use app\models\Visits;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\VisitsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Запись';
?>
<div class="visits-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'client.fio',
            'services.name_of_service',
            'employee.name',
            'date',
            'time',
            //'service_rendered',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Visits $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_visitor' => $model->id_visitor]);
                 }
            ],
        ],
    ]); ?>


</div>
