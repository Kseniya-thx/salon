<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */

/** @var app\models\ContactForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;

$this->title = 'Контакты';
?>
<div class="site-contact">

    <div class="row">
        <div class="col-md-7">
            <h1><?= Html::encode($this->title) ?></h1>
            <address>г. Москва, ул. Ленина, д. 1, 2 этаж</address>
            <p>Моб :+79991112233</p>
            <p>Email: contact@example.com</p>


            <h3>Оставьте нам сообщение</h3>


            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'subject') ?>

            <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
            ]) ?>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
        <div class="col-md-5">
            <img src="/images/contact.jpg" style="width: 100%"/>
        </div>
    </div>
</div>
