<?php


namespace app\controllers;


use app\models\Myuser;
use yii\web\Controller;
use Yii;

class UserController extends Controller
{
    public $layout = false;   //不继承模板

    public function actionIndex()
    {
//        print_r('index');
        $session = Yii::$app->session;
//        $session->set('username', 'zhang');
        $name = $session->get('username');

//        $name = 'zzz';
        return $this->render('index', ['username' => $name]);
    }

    //登录动作
    public function actionLogin()
    {
        $model = new Myuser();
        $request = Yii::$app->request;
        $msg = '';

        //判断输入框是否为空
        if ($request->isPost && $request->post()['Myuser']['name'] && $request->post()['Myuser']['password']) {
            $result = Myuser::find()->where(['name' => $request->post()['Myuser']['name']])->one();
//            print_r($request->post());

            if ($result && $result->password == $request->post()['Myuser']['password']) {
//                print_r($result->name);
                $session = Yii::$app->session;
                $session->set('username', $request->post()['Myuser']['name']);

                return $this->redirect(['index']);
            }else{
                $msg = 'username or password error';

            }
        }elseif($request->isGet){
            $msg = '';
        }else{
            $msg = 'username or password cannot be empty';
        }

        return $this->render('login', ['model' => $model,'msg'=>$msg]);
    }

    //推出登录
    public function actionLogout(){
        $session = Yii::$app->session;
        $session->remove('username');
        return $this->redirect(['index']);
    }


    //注册

    public function actionRegister (){
        $model = new Myuser();
        $request = Yii::$app->request;
        $msg = '';

        if ($request->isPost){

            if ($request->post()['Myuser']['name'] && $request->post()['Myuser']['password']){
                $result = Myuser::find()->where(['name'=> $request->post()['Myuser']['name']])->all();

                if ($result) {
                    $msg = 'User already exists';
                }else{

                    //这种方法插入数据未成功，原因未知
//                    $user = new Myuser();
//                    $user->name = $request->post()['Myuser']['name'];
//                    $user->password = $request->post()['Myuser']['password'];
//                    $user->save();

                    Yii::$app->db->createCommand()->insert('myuser', [
                        'name' => $request->post()['Myuser']['name'],
                        'password' => $request->post()['Myuser']['password'],
                    ])->execute();

                    return $this->render('aa.html');        //这是一个过渡页面
                }
            }else{
                $msg = 'Input can not be empty';
            }
        }
        return $this->render('register',['model' => $model,'msg'=>$msg]);
    }



}