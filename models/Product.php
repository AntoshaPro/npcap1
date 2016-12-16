<?php
/**
 * Created by PhpStorm.
 * User: proskurin
 * Date: 16.12.16
 * Time: 8:44
 */

namespace app\models;


use yii\db\ActiveRecord;

/**
 * Class Product
 * @package app\models
 */
class Product extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent']);
    }
}