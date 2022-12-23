<?php

use app\models\Employee;
use app\models\Services;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Visits $model */
?>

<div class="visits-form">

    <?php $form = ActiveForm::begin([
        'encodeErrorSummary' => false,
        'errorSummaryCssClass' => 'help-block',
    ]); ?>

    <?= $form->errorSummary($model) ?>

    <?= $form->field($model, 'id_services')->dropDownList(ArrayHelper::map(Services::find()->all(), 'id_services', 'name_of_service')) ?>

    <?= $form->field($model, 'id_employee')->dropDownList(ArrayHelper::map(Employee::find()->all(), 'id_employee', 'fullName')) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Записаться', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
