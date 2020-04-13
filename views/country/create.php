<?php

use yii\helpers\Html;

use app\assets\AppAsset;

AppAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = 'Create Country';
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginPage() ?>
<?php $this->head() ?> <!--  //加载css-->
<?php $this->beginBody() ?> <!-- //加载js-->
<div class="country-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php $this->endBody() ?>
<?php $this->endPage() ?>
