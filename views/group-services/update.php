<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\GroupServices $model */

$this->title = 'Обновить группу услуг №' . $model->id_group_services;
?>
<div class="group-services-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
