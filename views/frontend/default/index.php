<?php 

#$this->title = 'Modül çalışıyor.';

use yii\data\ActiveDataProvider;
use kouosl\AirCron\bundles\CustomAsset;


CustomAsset::register($this);
?>


<div class="site-index">

<h1>Aircron</h1>

<div class="grid-container">

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
      <td><center><Button class="btn btn-danger"> Delete </button></center></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>http://websitem.com/aircron/test2.php</td>
      <td>10.08.20 08:30:0</td>
      <td>ses(user_id)</td>
      <td><center><Button class="btn btn-danger"> Delete </button></center></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>http://websitem.com/aircron/test3.php</td>
      <td>600</td>
      <td>ses(user_id,clock(latency:digit))</td>
      <td><center><Button class="btn btn-danger"> Delete </button></center></td>
    </tr>
  </tbody>
</table>


<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddCronModal"> Add AirCron Job </button></td>
</div>

</div>





<div class="modal fade" id="AddCronModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
         
          <button type="button" class="btn btn-primary" data-dismiss="modal" >Cron Ekle</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
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
      
        <div class="modal-body">
          "<br>
          id : xxx<br>
          sayfa : xxx<br>
          "
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Evet</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hayır</button>
        </div>
      </div>
    </div>
</div>