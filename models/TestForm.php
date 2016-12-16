<?php
/**
 * Created by PhpStorm.
 * User: proskurin
 * Date: 15.12.16
 * Time: 14:52
 */

namespace app\models;

use yii\db\ActiveRecord;


/**
 * Class TestForm
 * @package app\models
 */
class TestForm extends ActiveRecord
{

    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
          'name' => 'Имя',
          'email' => 'E-mail',
          'text' => 'Текст сообщения',
        ];
 }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['name', 'text'], 'required'],
            ['email', 'safe'],

        ];
 }

    /**
     * @param $attrs
     */
    public function myRule($attrs)
    {
        if(!in_array($this->$attrs, ['hello', 'world'])){
            $this->addError($attrs, 'Ошибка!');
        }
 }

}