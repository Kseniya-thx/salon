<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Visits $model */

$this->title = 'Изменить данные визита: ' . $model->id_visitor;
?>
<div class="visits-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
