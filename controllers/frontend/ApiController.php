<?php

namespace kouosl\AirCron\controllers\frontend;

class ApiController extends \kouosl\base\controllers\frontend\BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        header('Content-type: application/json');
        $response = ['error'=>'Use a POST request'];

        if (isset($_GET['gamescores']))
            $response = $this->GetGameHighscores($_GET['gamescores']);
        else if (isset($_GET['userscores']))
            $response = $this->GetUserHighscores($_GET['userscores']);
        else if (isset($_GET['usergamecount']))
            $response = $this->GetUserGameCount($_GET['usergamecount']);
            
        echo '{' . json_encode($response) . '}';
        die();
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