<?php

namespace kouosl\AirCron\controllers\frontend;
use yii\data\ActiveDataProvider;
use Yii;
class ApiController extends \kouosl\base\controllers\frontend\BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        header('Content-type: application/json');
        

        if($_POST)
        {

            $q = $_POST["query"];
            $keycode = $q["keycode"];
           
            if($keycode == "job_add")
            {
                $page = $q["page"]; //1
                $interval = $q["interval"]; //2
                $postdata = $q["postdata"]; //3


                $t = date("Y-m-d H:i:s");
                $session = Yii::$app->user->getId(); 
                $cronval = "Create Cron; route ->".$page." interval ->".$interval." data ->".$postdata;
                $sql = "insert into AircronLogs (username, logdate, action, cronvalue) values ('".$session."', '".$t."', 'create', '".$cronval."')";
                Yii::$app->db->createCommand($sql)->execute();

            }
            else if ($keycode == "job_delete")
            {
                $jobid = $q["jobID"];
                //add  query

                $t = date("Y-m-d H:i:s");
                $session = Yii::$app->user->getId(); 
                $cronval = "Delete id ->".$jobid;
                $sql = "insert into AircronLogs (username, logdate, action, cronvalue) values ('".$session."', '".$t."', 'delete', '".$cronval."')";
                Yii::$app->db->createCommand($sql)->execute();

                echo "ok";

            }
            else if ($keycode == "job_edit")
            {
                $jobid = $q["jobID"];
                $columndid = $q["columndID"];
                $newvalue = $q["newvalue"];



                $column = "";
                if($columndid == 1)
                {
                    $column = "page";
                }
                else if ($columndid == 2)
                {
                    $column = "interval";

                }
                else if ($columndid == 3)
                {
                    $column = "data";
                }
                $cronval = "(".$column.") -> ".$newvalue;
                $t = date("Y-m-d H:i:s");
                $session = Yii::$app->user->getId(); 
                //add query
                $sql = "insert into AircronLogs (username, logdate, action, cronvalue) values ('".$session."', '".$t."', 'edit', '".$cronval."')";
                //$$parameters = array(":user_id"=>$user->id, ':created' => date('Y-m-d H:i:s'));
                Yii::$app->db->createCommand($sql)->execute();
               

            }
            else
            {

                $response = ['error'=>'Use a POST request'];

                echo '{' . json_encode($response) . '}';
                die();
            }



        }
        else
        {
            if(isset($_GET['logs']))
            {
                $hamper = Yii::$app->db->createCommand('SELECT * FROM AircronLogs LIMIT 20')->queryAll();

                $stack = '<table class="table table-bordered table-dark">
                <thead>
                  <tr> 
                  <th scope="col">id</th>
                  <th scope="col">user id</th>
                  <th scope="col">logdate</th>
                  <th scope="col">Action</th>
                  <th scope="col">Cron Change Value</th>
                </tr>
                </thead>
                <tbody>';

                $index = 1;
              
                foreach($hamper as $h)
                {
                    $stack.='  <th scope="row">'.$index.'</th>';
                    $stack.='  <td scope="row">'.$h["username"].'</td>';
                    $stack.='  <td scope="row">'.$h["logdate"].'</td>';
                    $stack.='  <td scope="row">'.$h["action"].'</td>';
                    $stack.='  <td scope="row">'.$h["cronvalue"].'</td>';
                    $stack.=' </tr>';
                    $index++;
                }


                $stack .='  </tbody>
                </table>';
                echo $stack;
            }
            else
            {
                //$path = $_SERVER['DOCUMENT_ROOT']."/vendor/kouosl/portal-AirCron/assets/data/cronbase.json";
              
            }
           
        }
        
    
    }

    private function GetGameHighscores($id){
        $hdata = new \yii\data\ActiveDataProvider([
            'query' => \kouosl\platformer\models\Apidatas::find()->where("gameid='". $id ."'")->orderBy([
                'score' => SORT_DESC
            ])
        ]);

        $hmodel = $hdata->GetModels();
        
        $response = array();
        for ($i=0;$i<count($hmodel);$i++)
        {
            $response[] =  ['user_id'=>$hmodel[$i]->userid, 'score'=> $hmodel[$i]->score];
        }
        return $response;
    }

    private function GetUserHighscores($id){
        $hdata =new \yii\data\ActiveDataProvider([
            'query' => \kouosl\platformer\models\Apidatas::find()->where("userid='". $id ."'")
        ]);

        $hmodel = $hdata->GetModels();
        
        $response = array();
        for ($i=0;$i<count($hmodel);$i++)
        {
            $response[] =  ['game_id'=>$hmodel[$i]->gameid, 'score'=> $hmodel[$i]->score];
        }
        return $response;
    }

    private function GetUserGameCount($id){
        $hdata =new \yii\data\ActiveDataProvider([
            'query' => \kouosl\platformer\models\Highscores::find()->where("userid='". $id ."'")
        ]);

        $hmodel = $hdata->GetModels();
        
        $response = count($hmodel);
        
        return $response;
    }
}