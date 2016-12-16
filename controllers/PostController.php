<?php
/**
 * Created by PhpStorm.
 * User: proskurin
 * Date: 15.12.16
 * Time: 11:51
 */

namespace app\controllers;
use app\models\Category;
use Yii;
use app\models\TestForm;

/**
 * Class PostController
 * @package app\controllers
 */
class PostController extends AppController
{
   public $layout = 'basic';

    public function beforeAction($action)
    {
        if($action->id == 'index'){
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
   }

    /**
     * @return string
     */
    public function actionIndex()
    {
        if(Yii::$app->request->isAjax){
            debug(Yii::$app->request->post());
            return 'test';
        }

//        $post = TestForm::findOne(2);
//        $post->email = '222@npc.local';
//        $post->save();

//        $post->delete();

//        TestForm::deleteAll(['>','id',3]);
//        TestForm::deleteAll();

        $model = new TestForm();
//       $model->name = 'Автор';
//        $model->email = 'proskurin@npc.local';
//        $model->text = 'Текст сообщения';
//        $model->save();


        if($model->load(Yii::$app->request->post())) {
            if($model->save()){
                Yii::$app->session->setFlash('success', 'Данные приняты');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка');
            }
        }

        $this->view->title = 'Все статьи';
        return $this->render('test', compact('model'));
   }

    /**
     * @return string
     */
    public function actionShow()
    {

        $this->view->title ='Одна статья';
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевики...']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'описание страницы...']);

//        $cats = Category::find()->all();
//        $cats = Category::find()->orderBy(['id'=> SORT_DESC])->all();
//        $cats = Category::find()->asArray()->all();
//          $cats = Category::find()->asArray()->where(['parent' => 691])->all();
//          $cats = Category::find()->asArray()->where(['like', 'title', 'pp' ])->all();
//          $cats = Category::find()->asArray()->where(['<=','id', 695])->all();
//          $cats = Category::find()->asArray()->where('parent=691')->limit(2)->all();
//          $cats = Category::find()->asArray()->where('parent=691')->limit(1)->one();
//          $cats = Category::find()->asArray()->where('parent=691')->count();
//          $cats = Category::findOne(['parent' => 691]);
//          $cats = Category::findAll(['parent' => 691]);
//          $query = 'SELECT * FROM catalog.categories WHERE title LIKE "%pp%"';
//        $cats = Category::findBySql($query)->all();
//            $query = 'SELECT * FROM catalog.categories WHERE title LIKE :search';
//            $cats = Category::findBySql($query, [':search'=> '%pp%'])->all();

//        $cats = Category::find()->with('products')->where('id=694')->all();
//        $cats = Category::find()->all(); //Отложенная загрузка всех данных (Ленивая) - если мало объектов.
        $cats = Category::find()->with('products')->all(); //Жадная загрузка - если массив из множества объектов

            return $this->render('show', compact('cats'));
   }



    /**
     * @return string
     */
    public function actionTest()
    {
        $model = new TestForm();
        return $this->render('test', compact('model'));
   }

}