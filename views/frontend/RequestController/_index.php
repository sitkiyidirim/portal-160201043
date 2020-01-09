<?php
use kouosl\theme\helpers\Html;
use kouosl\theme\widgets\Portlet;
use yii\data\ActiveDataProvider;



$data['title'] = Html::encode($this->title);
$this->params['breadcrumbs'][] = $this->title;
Portlet::begin();//['title' => $this->title]
echo $this->render('index');
Portlet::end();
