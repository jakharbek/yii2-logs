<?php
/**
 *  @author Jakhar <jakharbek@gmail.com>
 *  @author Maqsud <https://github.com/maqsudkarimov>
 *  @author O`tkir   <https://t.me/Utkir24>
 *  @company OKS Technologies <info@oks.uz>
 *  @package Task Manager
 */

namespace jakharbek\logs\models;

use jakharbek\logs\LogInterface;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * Class Logs
 * @package common\modules\logs\models
 */
class Logs extends \yii\db\ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'logs';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['message'], 'string'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'log_id'  => Yii::t( 'main', 'Log ID' ),
            'message' => Yii::t( 'main', 'Message' ),
        ];
    }

    /**
     * @param $message
     * @param ActiveRecord $model
     * @return bool
     */
    public static function create($message,ActiveRecord $model)
    {
        if(empty($message)){return false;}
        if(!($model instanceof ActiveRecord)){return false;}
        $log = new self();
        $log->message = $message;
        if ($log->save()) {
            $log->link($model::tableName(), $model);
            return true;
        }

        return false;
    }

    /**
     * @param LogInterface|null $model
     * @return mixed
     */
    public function render(LogInterface $model = null){
        if($model == null){return $this->messsage;}
        $model_render = $model->logRender($this);
        if($model_render){
            return $model_render;
        }
        return $this->message;
    }

}
