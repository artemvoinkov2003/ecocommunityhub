<?php

namespace app\modules\admin\controllers;

use yii;
use yii\web\UploadedFile;
use app\models\Articles;
use app\models\ArticlesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticlesController implements the CRUD actions for Articles model.
 */
class ArticlesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Articles models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ArticlesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Articles model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Articles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Articles();
        $model->status = 1; // Active by default
        $model->views = 0;
        $imagePath = Yii::getAlias('@webroot/uploads/articles/');

        if ($model->load(Yii::$app->request->post())) {
            // Handle image upload
            $image = UploadedFile::getInstance($model, 'image');
            if ($image) {
                $imageFile = Yii::$app->security->generateRandomString() . '.' . $image->extension;
                $model->image = 'uploads/articles/' . $imageFile;
                if (!is_dir($imagePath)) {
                    mkdir($imagePath, 0777, true);
                }
                $image->saveAs($imagePath . $imageFile);
            }
            
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Статья успешно создана');
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Articles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldImage = $model->image;
        $imagePath = Yii::getAlias('@webroot/uploads/articles/');

        if ($model->load(Yii::$app->request->post())) {
            // Handle image upload
            $image = UploadedFile::getInstance($model, 'image');
            if ($image) {
                // Delete old image if exists
                if ($oldImage && file_exists($imagePath . $oldImage)) {
                    unlink($imagePath . $oldImage);
                }
                $imageFile = Yii::$app->security->generateRandomString() . '.' . $image->extension;
                $model->image = 'uploads/articles/' . $imageFile;
                if (!is_dir($imagePath)) {
                    mkdir($imagePath, 0777, true);
                }
                $image->saveAs($imagePath . $imageFile);
            } else {
                $model->image = $oldImage;
            }
            
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Изменения сохранены');
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Articles model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $image = $model->image;
        $imagePath = Yii::getAlias('@webroot/uploads/articles/');
        
        // Delete image file if exists
        if ($image && file_exists($imagePath . $image)) {
            unlink($imagePath . $image);
        }
        
        $model->delete();
        Yii::$app->session->setFlash('success', 'Статья успешно удалена');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Articles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Articles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Articles::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
