<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Services $model */

$this->title = $model->name_of_service;
\yii\web\YiiAsset::register($this);
?>
<div class="services-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id_services' => $model->id_services], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id_services' => $model->id_services], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_services',
            'name_of_service',
            'employee.surname',
            'price',
            'group_service',
        ],
    ]) ?>

</div>
