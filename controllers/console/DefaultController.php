<?php
namespace kouosl\AirCron\controllers\console;


/**
 * Default controller for the `AirCron` module
 */
class DefaultController extends \kouosl\base\controllers\console\BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('_index');
    }
}
