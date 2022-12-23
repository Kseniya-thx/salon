<?php

/** @var yii\web\View $this */

use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

?>
<div class="site-admin">
    <?php
    NavBar::begin([
        'options' => ['class' => 'navbar-expand-md navbar-light bg-light ']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Сотрудникик', 'url' => ['/employee/index'], 'visible' => Yii::$app->user->id == 100],
            ['label' => 'Группы услуг', 'url' => ['/group-services/index'], 'visible' => Yii::$app->user->id == 100],
            ['label' => 'Услуги', 'url' => ['/services/index'], 'visible' => Yii::$app->user->id == 100],
            ['label' => 'Клиенты', 'url' => ['/clients/index'], 'visible' => Yii::$app->user->id == 100],
            ['label' => 'Должности', 'url' => ['/positions/index'], 'visible' => Yii::$app->user->id == 100],
            ['label' => 'Запись', 'url' => ['/visits/index'], 'visible' => Yii::$app->user->id == 100],
            ['label' => 'Контакты', 'url' => ['/contacts/index'], 'visible' => Yii::$app->user->id == 100],

        ]
    ]);
    NavBar::end();
    ?>

</div>

