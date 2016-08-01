<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

$bundle = AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <div class="ui grid header-wrap">

        <div class="tablet only mobile only column no-padding">
            <?php echo Html::img($bundle->baseUrl.'/images/banner-atas-bris.jpg',['class'=>'pull-left']) ?>
        </div>

        <div class="two column computer only row no-padding">
            <div class="column">
                <?php echo Html::img($bundle->baseUrl.'/images/banner-atas-bris.jpg') ?>
            </div>
            <div class="column">
                <?php echo Html::img($bundle->baseUrl.'/images/banner-atas-flare.jpg',['class'=>'pull-right']) ?>
            </div>
        </div>
    </div>
    

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
