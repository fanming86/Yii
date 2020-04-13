<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>
<!--//引用另外一个视图文件，类似继承-->
<?php echo $this->render('hello');?>

<!--引用block,提前需要顶顶block才能引用-->
<?//=$this->blocks['blockname']?>

<div class="student-form">

    <?php $form = ActiveForm::begin([
            'method' => 'get',      //定义请求方式为 get请求
    ]); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success'])  ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
