<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Articles;
use yii\data\Pagination;

class ArticleController extends Controller
{
    public function actionIndex($category = 'Все')
    {
        // Get all categories with their names
        $categoryData = (new \yii\db\Query())
            ->select(['id', 'name'])
            ->from('article_category')
            ->orderBy('name')
            ->all();
            
        // Create an array with 'id => name' pairs
        $categoryList = [];
        foreach ($categoryData as $cat) {
            $categoryList[$cat['id']] = $cat['name'];
        }
        
        // Add 'All' option at the beginning
        $categories = ['Все' => 'Все'] + $categoryList;

        $query = Articles::find()
            ->orderBy(['created_at' => SORT_DESC]);

        if (!empty($category) && $category !== 'Все') {
            $query->andWhere(['category_id' => $category]);
        }

        $articles = $query->all();

        return $this->render('index', [
            'articles' => $articles,
            'categories' => $categories,
            'activeCategory' => $category,
        ]);
    }

    public function actionView($id)
    {
        $article = Articles::findOne($id);

        if (!$article) {
            throw new NotFoundHttpException('Статья не найдена');
        }

        $article->updateCounters(['views' => 1]);

        $related = Articles::find()
            ->where(['category_id' => $article->category_id])
            ->andWhere(['!=', 'id', $article->id])
            ->limit(3)
            ->all();

        return $this->render('view', [
            'article' => $article,
            'related' => $related,
        ]);
    }
}