<?php
use kouosl\theme\helpers\Html;
use kouosl\theme\widgets\Portlet;
use kouosl\AirCron\messages\AirCron;


$this->title = 'AirCron';
$data['title'] = Html::encode($this->title);
$this->params['breadcrumbs'][] = $this->title;




Portlet::begin(['title' => $this->title,'subTitle' => '&nbsp;Kontrol Paneli','icon' => 'glyphicon glyphicon-th']);
echo $this->render('index');

Portlet::end();



