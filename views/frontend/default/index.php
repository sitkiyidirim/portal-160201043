<?php 

#$this->title = 'Modül çalışıyor.';

use yii\data\ActiveDataProvider;
use kouosl\AirCron\bundles\CustomAsset;


CustomAsset::register($this);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<div class="site-index">

<h1>Aircron</h1>

<div class="grid-container">
<?php

$hamper = Yii::$app->db->createCommand('SELECT * FROM migration')->queryAll();


//$sql = "insert into migration (version, apply_time) values (:version, :apply_time)";
//$parameters = array(":version"=>"oc", ':apply_time' => "ugur 11221");
//$response = Yii::$app->db->createCommand($sql)->execute($parameters);


//print_r($hamper);




?>


<table id="JobTable" class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">Job ID</th>
      <th scope="col">Page</th>
      <th scope="col">Date/Interval</th>
      <th scope="col">Data</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>http://websitem.com/aircron/test.php</td>
      <td>01.02.20 18:20:0</td>
      <td></td>
      <td><center><Button class="btn btn-danger"  data-toggle="modal" data-target="#DeleteCronModal"> Delete </button></center></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>http://websitem.com/aircron/test2.php</td>
      <td>10.08.20 08:30:0</td>
      <td>ses(user_id)</td>
      <td><center><Button class="btn btn-danger"  data-toggle="modal" data-target="#DeleteCronModal"> Delete </button></center></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>http://websitem.com/aircron/test3.php</td>
      <td>600</td>
      <td>ses(user_id,clock(latency:digit))</td>
      <td><center><Button class="btn btn-danger" data-toggle="modal" data-target="#DeleteCronModal"> Delete </button></center></td>
    </tr>
  </tbody>
</table>


<td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#AddCronModal"> Add AirCron Job </button></td>

<td><button type="button" class="btn btn-logs" data-toggle="modal" data-target="#ShowLogsModal"> View AirCron Logs </button></td>

</div>

</div>





<div class="modal fade" id="AddCronModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Yeni bir AirCron görevi ekleyin.</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <h4>Görevin Yönlendirme Sayfası</h4>
        <input type="text" id="html_yonlendirme" class="form-control" placeholder="http://ornekurl.com" aria-label="Username" aria-describedby="basic-addon1">
        <h4>Görevin Tarihi / Çalıştırılma Aralığı</h4>
        <input type="text" id="html_tarih" class="form-control" placeholder="Örneğin; 15.01.2020" aria-label="Username" aria-describedby="basic-addon1">
        <h4>Post Verisi</h4>
        <input type="text" id="html_postdata" class="form-control" placeholder="örneğin; ses(user_id,clock(latench:digit))" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="modal-footer">
         
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cron Ekle</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="">İptal</button>
        </div>
      </div>
    </div>
</div>



<div class="modal fade" id="DeleteCronModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Cron'u Silmek İstediğinize Emin Misiniz ?</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Evet</button>
          <button type="button" class="btn btn-dark" data-dismiss="modal">Hayır</button>
        </div>
      </div>
    </div>
</div>


<div class="modal fade" id="ShowLogsModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Kullanıcılar yapılan en son yapılan 20 cron işlemi aşağıda listelenmiştir :</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      
        <div class="modal-body" id= "modal-body-showlogsmodal">
          "<br>
          id : xxx<br>
          sayfa : xxx<br>
          "

          <code>Cronz
          </code>
        </div>

        <div class="modal-footer">
      
          <button type="button" class="btn btn-dark" data-dismiss="modal">Tamam</button>
        </div>
      </div>
    </div>
</div>