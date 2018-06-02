<?php
/**
 * Created by PhpStorm.
 * User: utkir
 * Date: 31.05.2018
 * Time: 18:01
 */

namespace jakharbek\logs\widgets;

use Yii;
use Faker\Provider\Base;
use yii\base\Widget;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\data\BaseDataProvider;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use jakharbek\logs\Log;

class LogWidget extends Widget
{
    use Log;

    /**
     * @return string|void
     */
    public function run()
    {
        return $this->render($this->view,[
            'model' => $this->model,
            'provider' => $this->provider
        ]);
    }
}