<?php

$this->title = 'index';

use yii\helpers\Html;

?>

<h1><?= Html::encode($this->title) ?></h1>
<hr>

<?php  if (!$username): ?>
    <p>Hi <strong> guest </strong>,please <a href="/user/login"> sign in <a>/<a href="/user/register"> register <a> </p>
<?php else: ?>
    <p>Hello <strong><?=$username?></strong>,Welcome to login</p>
    <p><a href="/user/logout">logout</a></p>
<?php endif;?>


