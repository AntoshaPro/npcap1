<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<h1>Test ACTION</h1>
<?php if(Yii::$app->session->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= Yii::$app->session->getFlash('success')?>
    </div>
<?php endif;?>
<?php if(Yii::$app->session->hasFlash('error')):?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= Yii::$app->session->getFlash('error')?>
    </div>
<?php endif;?>
<?php $form = ActiveForm::begin(['options' => ['id'=> 'testForm']]) ?>
<?= $form->field($model, 'name')->label('Имя')?>
<?= $form->field($model, 'email')->input('email')?>
<?= $form->field($model, 'text')->label('Текст сообщения')->textarea(['rows'=> 5])?>
<?= Html::submitButton('Отправить', ['class' => 'btn btn-success'])?>
<?php ActiveForm::end() ?>
