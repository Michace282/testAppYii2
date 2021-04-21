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
    </div>
<?php endforeach; ?>