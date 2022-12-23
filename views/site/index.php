<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Инь-Янь';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-sm-12">
                <img src="/images/logo.jpg"/>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <h3>Оказываемые услуги</h3>
                <ul>
                    <?php foreach ($services as $service): ?>
                    <li><?= $service->name_of_services?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-sm-6">
                <h3>Записаться</h3>
                <?= Html::a('Записаться', ['visits/create']) ?>
            </div>
        </div>
    </div>
</div>
