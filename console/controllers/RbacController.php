<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\User;

class RbacController extends Controller {

    public function actionInit() {
        $auth = Yii::$app->authManager;

        // Удаляем старые данные из бд
        $auth->removeAll(); 
        
        // Создадим роли админа и пользователя
        $admin = $auth->createRole('admin');
		$manager = $auth->createRole('manager');
        $user = $auth->createRole('user');
        
        // запишем их в БД
        $auth->add($admin);
		 $auth->add($manager);
        $auth->add($user);
        
        // Назначаем роль admin пользователю с ID 1
        $auth->assign($admin, 1);
}