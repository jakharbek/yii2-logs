<?php
/**
 * Created by PhpStorm.
 * User: utkir
 * Date: 02.06.2018
 * Time: 16:05
 */

namespace jakharbek\logs\widgets;

use jakharbek\logs\Log;
/**
 * Class LogListWidget
 */
class LogListWidget extends \yii\widgets\ListView {

    use Log  {
        setProvider as public setProviderLog;
        getProvider as public getProviderLog;
    }

    /**
     * @param $value
     * @return \yii\data\BaseDataProvider|\yii\data\DataProviderInterface
     */
    public function setProvider($value)
    {
        try{
            $this->setProviderLog($value);
            return $this->dataProvider = $this->_provider;
        }
        catch (Exception $exception){
            Yii::error($exception->getMessage());
        }
        return $this->dataProvider;
    }

    /**
     * @return \yii\data\DataProviderInterface
     */
    public function getProvider(){
        $this->getProviderLog();
        return $this->dataProvider;
    }
}