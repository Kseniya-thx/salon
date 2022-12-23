<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\GroupServices $model */

$this->title = $model->name_of_services;
YiiAsset::register($this);
?>
<div class="group-services-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id_group_services' => $model->id_group_services], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id_group_services' => $model->id_group_services], [
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
            'id_group_services',
            'name_of_services',
        ],
    ]) ?>

</div>
