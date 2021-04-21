<?php

namespace backend\parsing;

use yii\base\Object;
use common\models\Url;

class Parsing extends Object implements \yii\queue\Job
{
    public $id;

    public function execute($queue)
    {
      $urls = Url::findOne($id);
      if ($urls->getTitle()) {
		    Yii::$app->getSession()->setFlash('success', 'Title получен'); 
		}
		else {
			Yii::$app->getSession()->setFlash('error', 'Ошибка получения Title');
		}	 	  
    }
}