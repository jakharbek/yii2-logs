<?php
/**
 * Created by PhpStorm.
 * User: utkir
 * Date: 31.05.2018
 * Time: 18:01
 */

namespace jakharbek\logs;

use Yii;
use Faker\Provider\Base;
use yii\base\Widget;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\data\BaseDataProvider;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * Class LogWidget
 * @package common\modules\logs\widgets
 */
trait Log
{
    /**
     * @var ActiveRecord|LogInterface $model
     */
    public $model;
    /**
     * @var string
     */
    public $view = 'list';
    /**
     * @var BaseDataProvider $provider
     */
    private $_provider;

    /**
     * @var ActiveRecord $_searchModel
     */
    private $_searchModel;


    /**
     *
     */
    public function init()
    {
        if($this->view == '') {
            $this->view = 'list';
        }
        parent::init();
    }

    /**
     * @return ActiveDataProvider|BaseDataProvider
     */
    public function getProvider(){
        if($this->_provider instanceof BaseDataProvider){return $this->_provider;}
        $this->_provider = new ArrayDataProvider([
            'allModels' => $this->model->logs
        ]);
        return $this->_provider;
    }

    /**
     * @param $value
     * @return object|BaseDataProvider
     * @throws \yii\base\InvalidConfigException
     */
    public function setProvider($value){
        $arr = [
            'class' => ArrayDataProvider::className(),
            'allModels' => $this->model->logs
        ];
        $arr = ArrayHelper::merge($arr,$value);
        $this->_provider = Yii::createObject($arr);
        return $this->_provider;
    }
}