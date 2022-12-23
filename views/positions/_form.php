<?php

use app\models\GroupServices;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Positions $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="positions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_of_job_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'services_group')->dropDownList(ArrayHelper::map(GroupServices::find()->all(), 'id_group_services', 'name_of_services')) ?>

    <?= $form->field($model, 'schedule')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
