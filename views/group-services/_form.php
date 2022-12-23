<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\GroupServices $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="group-services-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_of_services')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
