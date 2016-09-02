<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\base\DynamicModel;

class SiteController extends Controller {

    public $layout = 'content';

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        $this->layout = 'main';
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin() {
        if (Yii::$app->request->isAjax) {

            $model = new DynamicModel([
                'username', 'password'
            ]);
            $model->addRule(['username', 'password'], 'required');

            if (isset($_POST['data'])) {
                $data = rawurldecode(base64_decode($_POST['data']));
                parse_str($data, $get_array);
                if ($model->load($get_array)) {

                    $params = [
                        "user_id" => $model->username,
                        "password" => $model->password,
                        "ip_login" => Yii::$app->request->getUserIP(),
                    ];

                    try {
                        $params = json_encode($params);

                        $wsdl = Yii::$app->params['wsdl'];
                        $client = new \SoapClient($wsdl);
                        $response = $client->Login(array('params' => $params));
                        $response = $response->return;

                        $results = json_decode($response);
                    } catch (Exception $e) {
                        $response = [
                            'status' => '99',
                            'statusMsg' => $e->getMessage(),
                            'params' => $param = json_decode($param),
                        ];
                        $results = json_decode($response);
                    }
                    
                    return $this->render('main');

                    if ($results->status == '00') {
                        return $this->render('main');
                    } else if ($results->status == '01') {
                        $model->addError('username', $results->statusMsg);
                    } else if ($results->status == '02') {
                        $model->addError('password', $results->statusMsg);
                    } else {
                        Yii::$app->session->setFlash('error', $results->statusMsg);
                    }
                }
            }

            return $this->render('login', [
                'model' => $model,
            ]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout() {
        return $this->render('about');
    }

}
