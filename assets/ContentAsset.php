<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ContentAsset extends AssetBundle
{
    public $sourcePath = '@vendor/layout';
    public $css = [
    ];
    public $js = [
//        'js/content.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
