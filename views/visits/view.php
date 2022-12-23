<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Visits $model */

$this->title = $model->id_visitor;
YiiAsset::register($this);
?>
<div class="visits-view">

    <p>
        <?= Html::a('Обновить', ['update', 'id_visitor' => $model->id_visitor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id_visitor' => $model->id_visitor], [
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
            'client.fio',
            'services.name_of_service',
            'employee.name',
            'date',
            'time',
            'service_rendered',
        ],
    ]) ?>

</div>
