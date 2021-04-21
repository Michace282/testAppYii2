<?php
   use yii\helpers\Url;
?>
<h1>Список ссылок</h1>
<a href="<?=Url::to(['url/form'])?>">Добавить ссылку</a>
<?php 
if (!empty($urls))
foreach($urls as $url): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $url->url ?></h3>
        </div>
        <div class="panel-body">
            <?= (!empty($url->title) ? 'Status 1: '.$url->title : 'Status 2: Title не получен, нажмите на кнопку ниже чтобы повторить попытку.') ?>
			
			<br>
			<a href="<?=Url::to(['url/gettitle','id' => $url->id])?>">Получить Title</a>
			
        </div>
    </div>
<?php endforeach; ?>