<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => 'Салон красоты Инь-Янь',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'О нас', 'url' => ['/site/about']],
            ['label' => 'Контакты', 'url' => ['/site/contact']],


            ['label' => 'Консоль администратора', 'url' => ['/employee/index'], 'visible' => Yii::$app->user->id == 100],
            ['label' => 'Мои визиты', 'url' => ['/visits/my'], 'visible' => Yii::$app->user->id == 102],

            ['label' => 'Записаться', 'url' => ['/visits/create'], 'visible' => Yii::$app->user->id == 101],

            ['label' => 'Зарегистрироваться', 'url' => ['/clients/create'], 'visible' => Yii::$app->user->isGuest],
            Yii::$app->user->isGuest
                ? ['label' => 'Войти', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                . Html::beginForm(['/site/logout'])
                . Html::submitButton(
                    'Выход (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'nav-link btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
        ]
    ]);
    NavBar::end();
    ?>
</header>


<main role="main" class="flex-shrink-0">
    <div class="container">
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
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; Инь-Янь <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
