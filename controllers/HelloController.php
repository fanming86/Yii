<?php


namespace app\controllers;

use Yii;
use http\Message;
use yii\web\Controller;

use app\models\Student;

class HelloController extends Controller

{
    public $layout=false;
    public function actionIndex($msg = 'default')
    {

//        return 'hello world!'; //直接返回字符串 hello world
//        return $this->render('hello');  //渲染视图
//        return $this->render('helloIndex',['message'=> $msg]);  //http://yii.com/index.php?r=hello/index&msg=123

        //查询数据库
        $a = Student::find()->all();    //返回数组
//        var_dump($a);
//        var_dump($a[0]->name);

        $b = Student::find()->where(['id' => 1])->one();    //返回一条数据
//        var_dump($b);
//        echo $b->name;
        return $this->render('helloIndex',['message'=> $b]);
    }

    /**
     *
     */
    public function actionGetv(){
        $model = new Student();

        if (Yii::$app->request->method == 'GET'){
            return $this->render('form',['model'=> $model]);
        }
        elseif (Yii::$app->request->method == 'POST'){
            $a = Yii::$app->request;
//            var_dump($a);
//获取name的值，$a为一个数组，按文档中的方法$a->post()无法取到值，原因未知**************
            $name = $a->post()['Student']['name'];
            print_r($name);
//            print_r(Yii::$app->request->post());
            $model->name = $name;
        };




    }


}