<?php

namespace app\controllers;

use app\models\Reviews;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\RegisterForm;
use app\models\Event;
use app\models\EventRegistration;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
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
    public function actionIndex()
    {
       return $this->render('index');
    }


    public function actionClimate()
    {
        return $this->render('climate');
    }

    public function actionEnergy()
    {
        return $this->render('energy');
    }

    public function actionCosts()
    {
        return $this->render('costs');
    }

    public function actionWaste()
    {
        return $this->render('waste');
    }

    public function actionWind()
    {
        return $this->render('wind');
    }

    public function actionSolar()
    {
        return $this->render('solar');
    }

    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->register()) {
                return $this->goHome();
            }
        }
        return $this->render('register',
            ['model' => $model],
        );
    }


    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
     public function actionContact()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/site/register']);
        }

        $model = new ContactForm();        
        $reviews = Reviews::find()
            ->where(['article_id' => null])
            ->orderBy(['created_at' => SORT_DESC])
            ->all();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->image = UploadedFile::getInstance($model, 'image');
            $review = new Reviews();
            $review->user_id = Yii::$app->user->identity->id;
            $review->text = $model->text;
            $review->rating = $model->rating; 
            $review->article_id = null; 

            if ($model->image) {
                $fileName = 'review_' . time() . '.' . $model->image->extension;
                $filePath = 'uploads/reviews/' . $fileName;
                if ($model->image->saveAs($filePath)) {
                    $review->photo = $filePath;
                }
            }

            if ($review->save()) {
                Yii::$app->session->setFlash('success', 'Спасибо за отзыв!');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка при отправке отзыва: ' 
                    . implode(' ', $review->getFirstErrors()));
            }
        }

        return $this->render('contact', [
            'model' => $model,
            'reviews' => $reviews,
        ]);
    }
    
    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}