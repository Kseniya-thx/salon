<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Contacts $model */

YiiAsset::register($this);
?>
<div class="contacts-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id_client' => $model->id_client], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id_client' => $model->id_client], [
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
            'e_mail',
            'telegram',
        ],
    ]) ?>

</div>
