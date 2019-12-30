<?php 

#$this->title = 'Modül çalışıyor.';

use yii\data\ActiveDataProvider;
use kouosl\AirCron\bundles\CustomAsset;


CustomAsset::register($this);
?>


<div class="site-index">

<h1>Aircron</h1>

<div class="grid-container">

<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">Job ID</th>
      <th scope="col">Page</th>
      <th scope="col">Date/Interval</th>
      <th scope="col">Data</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>http://websitem.com/aircron/test.php</td>
      <td>01.02.20 18:20:0</td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>http://websitem.com/aircron/test2.php</td>
      <td>10.08.20 08:30:0</td>
      <td>ses(user_id)</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>http://websitem.com/aircron/test3.php</td>
      <td>600</td>
      <td>ses(user_id,clock(latency:digit))</td>
    </tr>
  </tbody>
</table>

</div>

</div>

