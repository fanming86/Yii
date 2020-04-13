<?php


$this->title = 'register';

use yii\helpers\Html;
use \yii\widgets\ActiveForm;
?>

<h2><?=Html::encode($this->title)?></h2>
<br>
<?=Html::encode($msg)?>
<hr>

<?php $form = ActiveForm::begin(); ?>

<!--<?= $form->field($model, 'id') ?>-->

<?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
<?= $form->field($model, 'password')->passwordInput() ?>

<?= Html::submitButton('Submit') ?>

<?php ActiveForm::end(); ?>

<p></p>
