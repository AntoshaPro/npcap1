<?php
/**
 * Created by PhpStorm.
 * User: proskurin
 * Date: 15.12.16
 * Time: 11:12
 */

namespace app\controllers;

/**
 * Class MyController
 * @package app\controllers
 */
class MyController extends AppController
{
    /**
     * @param null $id
     * @return string
     */
    public function actionIndex($id = null)
    {
        $hi = 'Hellow, world';
        $names = ['Ivanov', 'Petrov', 'Sidorov'];
//        return $this->render('index', ['hello' => $hi, 'names'=> $names]);
        return $this->render('index', compact('hi', 'names', 'id'));
    }

    /**
     * @return string
     */
    public function actionBlogPost()
    {
        // my/blog_post
        return 'Blog Post';
    }
}