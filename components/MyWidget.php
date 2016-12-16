<?php

/**
 * Created by PhpStorm.
 * User: proskurin
 * Date: 16.12.16
 * Time: 11:05
 */
namespace app\components;

use yii\base\Widget;

/**
 * Class MyWidget
 * @package app\components
 */
class MyWidget extends Widget
{
    public $name;

    public function init()
    {
        parent::init();
//        if($this->name === null) $this->name = 'Гость';
        ob_start();
    }

    /**
     * @return string
     */
    public function run()
    {

        $content = ob_get_clean();
        $content = mb_strtoupper($content, 'utf8');
        return $this->render('my', compact('content'));

//        return $this->render('my', ['name' => $this->name]);
    }
}