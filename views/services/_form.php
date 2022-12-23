<?php

use app\models\Employee;
use app\models\GroupServices;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Services $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="services-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_of_service')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee')->dropDownList(ArrayHelper::map(Employee::find()->all(), 'id_employee', 'fullName')) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'group_service')->dropDownList(ArrayHelper::map(GroupServices::find()->all(), 'id_group_services', 'name_of_services')) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
