<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Employee $model */

$this->title = $model->name;
YiiAsset::register($this);
?>
<div class="employee-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id_employee' => $model->id_employee], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id_employee' => $model->id_employee], [
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
            'id_employee',
            'surname',
            'name',
            'middle_name',
            'jobTitle.name_of_job_title',
            'address',
            'mob_telefon',
        ],
    ]) ?>

</div>
