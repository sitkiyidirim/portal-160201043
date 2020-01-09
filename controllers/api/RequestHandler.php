<?php
namespace kouosl\AirCron\controllers\api;


/**
 * Default controller for the `AirCron` module
 */
class RequestHandler extends \kouosl\base\controllers\api\BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('_RequestHandler');
    }
}
