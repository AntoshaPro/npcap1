<?php

/**
 * Created by PhpStorm.
 * User: proskurin
 * Date: 15.12.16
 * Time: 11:28
 */
namespace app\controllers\admin;

use app\controllers\AppController;

/**
 * Class UserController
 * @package app\controllers\admin
 */
class UserController extends AppController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}