<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Positions $model */

$this->title = $model->name_of_job_title;
YiiAsset::register($this);
?>
<div class="positions-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id_positions' => $model->id_positions], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id_positions' => $model->id_positions], [
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
            'id_positions',
            'name_of_job_title',
            'services_group',
            'schedule',
        ],
    ]) ?>

</div>
