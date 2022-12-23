<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\GroupServices $model */

$this->title = 'Добавить группу услуг';
?>
<div class="group-services-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
