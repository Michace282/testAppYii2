<?php
namespace backend\controllers;
use Yii;
use yii\web\Controller;
use common\models\Url;
 
class UrlController extends Controller
{
 
    public function actionIndex(){
		$urls = Url::find()->all();		
		$roleModel = Yii::$app->db
          ->createCommand("Select * from auth_assignment where user_id='".Yii::$app->user->getId()."'")
          ->queryOne();

        return ($roleModel['item_name'] == 'admin') ? $this->render('index', ['urls'=>$urls]) : $this->render('indexM', ['urls'=>$urls]);
    }
	
	public function actionForm()
    {
    $model = new Url();

        
	if ($model->load(Yii::$app->request->post())) {
                if ($model->save(false)) {
                    Yii::$app->getSession()->setFlash('success', 'Ссылка добавлена');
                   return $this->redirect(['url/index']);
                } else {
                    Yii::$app->getSession()->setFlash('error', 'Ошибка добавлении ссылки');
                }
            }	
		
    return $this->render('form', ['model'=>$model]);
	}
	
	public function actionGettitle($id)
    {
		$url = Url::findOne($id);
		
		//Отправка задания в очередь
        $id = Yii::$app->queue->push(new \backend\parsing\Parsing([
          'id' => $id,
        ]));
		
		$url->status_id = $id;
		
	    if ($url->save()) {
		    Yii::$app->getSession()->setFlash('success', 'Title получен');
            return $this->redirect(['url/index']);
		}
		else {
			Yii::$app->getSession()->setFlash('error', 'Ошибка получения Title');
			return $this->redirect(['url/index']);
		}	
	}
    
}