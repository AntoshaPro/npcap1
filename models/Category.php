<?php
/**
 * Created by PhpStorm.
 * User: proskurin
 * Date: 15.12.16
 * Time: 17:36
 */

namespace app\models;


use yii\db\ActiveRecord;

/**
 * Class Category
 * @package app\models
 */
class Category extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'categories';
}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['parent' => 'id']);
    }
}