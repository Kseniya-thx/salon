<?php

use app\models\GroupServices;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\GroupServicesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Группы услуг';
?>
<div class="group-services-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name_of_services',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, GroupServices $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_group_services' => $model->id_group_services]);
                 }
            ],
        ],
    ]); ?>


</div>
