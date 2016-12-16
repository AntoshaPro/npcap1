<?php
/**
 * Created by PhpStorm.
 * User: proskurin
 * Date: 15.12.16
 * Time: 11:48
 */

namespace app\controllers;

use yii\web\Controller;

/**
 * Class AppController
 * @package app\controllers
 */
class AppController extends Controller
{
    /**
     * @param $arr
     */
    public function debug($arr)
    {
        echo '<pre>'. print_r($arr, true). '</pre>';
}
}
