<?php

use app\models\Positions;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\PositionsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Должности';
?>
<div class="positions-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name_of_job_title',
            'servicesGroup.name_of_services',
            'schedule',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Positions $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_positions' => $model->id_positions]);
                 }
            ],
        ],
    ]); ?>


</div>
