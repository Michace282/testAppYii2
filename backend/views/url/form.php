<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<h2>Добавление ссылки</h2>

<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'url')->textInput() ?>
	
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Send', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>