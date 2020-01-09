<?php


use yii\data\ActiveDataProvider;
$hamper = Yii::$app->db->createCommand('SELECT * FROM migration')->queryAll();


print_r($hamper);

?>