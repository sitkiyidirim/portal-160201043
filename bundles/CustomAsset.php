<?php

namespace kouosl\AirCron\bundles;

use yii\web\AssetBundle;

class CustomAsset extends AssetBundle {

    /**
     * @var string source assets path
     */
    public $sourcePath = '@kouosl/AirCron/assets/';

    /**
     * @var array depended bundles
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

    /**
     * @var array css assets
     */
    public $css = [
    ];


    
    /**
     * @var array html assets
     */
    public $modal = [
    
        'html/modal.html'
    ];


    /**
     * @var array js assets
     */
    public $js = [
        'javascript/panel.js'
    ];

    public function init()
    {
        //parent::init();
        // $this->js[] = 'i18n/' . Yii::$app->language . '.js'; // dynamic file added
    }
}