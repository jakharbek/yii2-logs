<?php
/**
 * Created by PhpStorm.
 * User: utkir
 * Date: 12.05.2018
 * Time: 18:03
 */

namespace jakharbek\logs\behaviors;

use jakharbek\logs\models\Logs;
use yii\base\Behavior;

/**
 * @property $owner ActiveRecord | Model
 */
class LogBehavior extends Behavior
{
    public function createLog($message)
    {
        return Logs::create($message,$this->owner);
    }
}