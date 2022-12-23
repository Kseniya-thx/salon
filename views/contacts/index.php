<?php

use app\models\Contacts;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ContactsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Контакты';
?>
<div class="contacts-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить   ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'e_mail',
            'telegram',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Contacts $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_client' => $model->id_client]);
                 }
            ],
        ],
    ]); ?>


</div>
