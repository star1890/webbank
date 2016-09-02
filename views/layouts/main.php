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
        <link type="image/x-icon" href="<?php echo $bundle->baseUrl; ?>/images/favicon.png" rel="shortcut icon">
        <?= Html::csrfMetaTags() ?>
    <!--    <title><?= Html::encode($this->title) ?></title>-->
        <title><?= Html::encode(Yii::$app->name) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="ui page dimmer">
            <div class="ui text loader">Loading</div>
        </div>


        <div class="wrap">

            <div class="ui grid header-wrap">
                <div class="ui stackable grid container">

                    <div class="two column computer only row no-padding">
                        <div class="column">
                            <?php echo Html::img($bundle->baseUrl . '/images/banner-atas-bris.jpg', ['class' => 'ui left floated image']) ?>
                        </div>
                        <div class="column">
                            <?php echo Html::img($bundle->baseUrl . '/images/banner-atas-flare.jpg', ['class' => 'ui right floated image']) ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ui borderless main menu">
                <div class="ui container" id="main-menu">
                    <div class="right menu">
                        <a class="item" href="#">BRISyariah</a>
                        <a class="item" href="#">Bantuan</a>
                        <div data-tooltip="Add users to your feed" data-position="bottom right" data-inverted="">
                            <a class="item" href="#">Demo</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ui container" id="content">
                <?= $content ?>
            </div>
        </div>


        <div class="footer">
            <div class="ui container">
                <div class="kiri">Syarat dan Ketentuan | Kebijakan Privasi dan Keamanan</div>
                <div class="kanan">Copyright &copy; 2016 PT. Bank BRISyariah</div>
            </div>
        </div>

        <!--<footer class="footer">
            <div class="ui container">
                Copyright &copy; 2016 PT. Bank BRISyariah
            </div>
        </footer>-->

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
