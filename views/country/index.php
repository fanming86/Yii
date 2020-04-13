<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\assets\AppAsset;

AppAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel app\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Countries';
$this->params['breadcrumbs'][] = $this->title;

$this->context->layout = false;   //禁用继承模板

?>
<!--下面三个用来加载js 和 css 文件-->
<?php $this->beginPage() ?>
<?php $this->head() ?> <!--  //加载css-->
<?php $this->beginBody() ?> <!-- //加载js-->

<div class="country-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Country', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
<?php $this->endBody() ?>
<?php $this->endPage() ?>
