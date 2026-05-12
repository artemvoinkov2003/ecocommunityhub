<?php

namespace app\controllers;

use app\models\ForumMessage;
use app\models\ForumSection;
use app\models\ForumTopic;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ForumController extends Controller
{
    public function actionIndex()
    {
        $sections = ForumSection::find()
            ->with(['lastTopic', 'lastTopic.author'])
            ->all();

        return $this->render('forum', [
            'sections' => $sections
        ]);
    }

    public function actionSection($id)
    {
        $section = ForumSection::findOne($id);
        if (!$section) {
            throw new NotFoundHttpException('Раздел не найден');
        }

        $topics = ForumTopic::find()
            ->where(['section_id' => $id])
            ->with(['author', 'lastMessage', 'lastMessage.author'])
            ->orderBy(['created_at' => SORT_DESC])
            ->all();

        return $this->render('forum-section', [
            'section' => $section,
            'topics' => $topics
        ]);
    }

    public function actionTopic($id)
    {
        $topic = ForumTopic::findOne($id);
        if (!$topic) {
            throw new NotFoundHttpException('Тема не найдена');
        }

        $messages = ForumMessage::find()
            ->where(['topic_id' => $id])
            ->with(['author'])
            ->orderBy(['created_at' => SORT_ASC])
            ->all();

        $newMessage = new ForumMessage();
        $newMessage->topic_id = $id;
        $newMessage->author_id = Yii::$app->user->id;

        if ($newMessage->load(Yii::$app->request->post())) {

            if (empty($newMessage->content)) {
                Yii::$app->session->setFlash('error', 'Текст сообщения не может быть пустым');
            } else {
                $newMessage->content = $newMessage->content;
                if ($newMessage->save()) {
                    Yii::$app->session->setFlash('success', 'Сообщение добавлено');
                    return $this->refresh();
                } else {
                    Yii::error($newMessage->getErrors(), 'forum-message-save');
                    Yii::$app->session->setFlash('error', 'Ошибка при сохранении сообщения');
                }
            }
        }

        return $this->render('forum-topic', [
            'topic' => $topic,
            'messages' => $messages,
            'newMessage' => $newMessage
        ]);
    }

    public function actionCreateTopic($section_id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        $section = ForumSection::findOne($section_id);
        if (!$section) {
            throw new NotFoundHttpException('Раздел не найден');
        }

        $model = new ForumTopic();
        $model->section_id = $section_id;
        $model->author_id = Yii::$app->user->id;

        if ($model->load(Yii::$app->request->post())) {
            // Set the content from the text field (if using WYSIWYG editor)
            if (isset(Yii::$app->request->post('ForumTopic')['text'])) {
                $model->content = Yii::$app->request->post('ForumTopic')['text'];
            }
            
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Тема успешно создана');
                return $this->redirect(['topic', 'id' => $model->id]);
            } else {
                $errorMessage = 'Ошибка при создании темы';
                if ($model->hasErrors()) {
                    $errorMessage .= ': ' . implode(' ', $model->getFirstErrors());
                }
                Yii::$app->session->setFlash('error', $errorMessage);
                Yii::error('Ошибки при создании темы: ' . print_r($model->errors, true), 'forum');
            }
        }

        return $this->render('create-topic', [
            'model' => $model,
            'section' => $section
        ]);
    }
}