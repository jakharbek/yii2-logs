Yii2 Logs
=========
Core

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist jakharbek/yii2-logs "*"
```

or add

```
"jakharbek/yii2-logs": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :
 
 

Вам нужно сделать миграцию:

```php
yii migrate --migrationPath=@vendor/jakharbek/yii2-logs/src/migrations
```

Если вы хотите применить к определёному таблицы вам нужно создать связь между ними
и в той модели (ActiveRecord) таблицы, реализовать интерфейс LogInterface

После вам нужно добавить в ваш класс новое поведение:
```php
jakharbek\logs\behaviors\LogBehavior
```

и тогда вы сможете добавить новый лог имено к этой модели


```php
$task = Tasks::findOne(1);
$task->createLog("Ваш лог");

```

или если вам не нужно данное удобство вы можете использовать статисческий метод класса Logs
```php
/**
    @param mixed $message
    @param LogInterface|ActiveRecord $model
*/
Logs::create($message,$model = null);
```
Пример 1:

```php
 <?=\jakharbek\logs\widgets\LogWidget::widget([
           'model' => $model,
            'view' => '@your/path/to/view',
            'provider' => [
                    'pagination' => [
                            'pageSize' => 20
                    ]
            ]
    ])?>
```

view

```php

/**
 * @var \jakharbek\logs\models\Logs $log
 * @var \yii\db\ActiveRecord $model
 * @var \yii\data\BaseDataProvider $provider
 */
 
echo ListView::widget([
        'dataProvider' => $provider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($log, $key, $index, $widget) use ($model) {
                return $log->render($model);
        }
    ]);

```
Пример 2:

```php
 <?=\jakharbek\logs\widgets\LogListWidget::widget([
           'model' => $model,
            'provider' => [
                    'pagination' => [
                            'pageSize' => 20
                    ]
            ],
            'itemOptions' => ['class' => 'item'],
            'itemView' => function ($log, $key, $index, $widget) use ($model) {
                return $log->render($model);
            }
    ])?>
```



