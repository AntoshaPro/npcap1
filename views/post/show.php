<?php
//$this->title = 'Одна статья';
use app\components\MyWidget;
?>

<?php $this->beginBlock('block1'); ?>
<h1>Заголовок страницы</h1>
    <?php $this->endBlock(); ?>
<h1>Show Action</h1>
<?php //echo MyWidget::widget(['name'=> 'Вася'])?>

<?php MyWidget::begin()?>
<h1>привет, мыр</h1>
<?php MyWidget::end()?>
<?php //debug($cats)?>
<?php //echo count($cats[0]->products)?>
<?php //debug($cats)?>


<?php
//foreach ($cats as $cat){
//    echo '<ul>';
//        echo '<li>' . $cat->title .'</li>';
//        $products = $cat->products;
//
//        foreach ($products as $product){
//            echo '<ul>';
//            echo '<li>' .$product->title. '</li>';
//            echo '</ul>';
//        }
//    echo '</ul>';
//}

?>

<button class="btn btn-success" id="btn">Нажми на меня...</button>
<?php
//$this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']);
//$this->registerJs("$('.container').append('<p>SHOW!!!</p>');", \yii\web\View::POS_LOAD);
//$this->registerCss('.container{background: #ccc}');

$js = <<<JS
    $('#btn').on('click', function() {
        $.ajax({
            url: 'index.php?r=post/index',
            type: 'POST',
            data: {test: '123'},
            success: function(res) {
             console.log(res);
            },
            error: function() {
              alert('Error!');
            }
        })
      
    })

JS;
$this->registerJs($js);

?>

