<?php
/**
 * Created by PhpStorm.
 * User: utkir
 * Date: 31.05.2018
 * Time: 16:57
 */

namespace jakharbek\logs;

use jakharbek\logs\models\Logs;


/**
 * Interface LogInterface
 * @package common\modules\logs\interfaces
 */
interface LogInterface
{
    /**
     * @param Logs $log
     * @return mixed
     */
    public function logRender(Logs $log);

    /**
     * @return mixed
     */
    public function getLogs();

}