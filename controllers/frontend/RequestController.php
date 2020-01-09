<?php
namespace kouosl\AirCron\controllers\frontend;


/**
 * Default controller for the `AirCron` module
 */
class RequestController extends \kouosl\base\controllers\frontend\BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
			 if (isset($_GET['RequestController']))
            return $this->render('_RequestController');
        return $this->render('_RequestController');
    }
}
