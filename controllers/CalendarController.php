<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Event;
use app\models\EventRegistration;
use yii\db\Expression;

class CalendarController extends Controller
{
    public function actionCalendar()
    {
        $events = Event::find()
            ->where(['>=', 'start_date', new Expression('CURDATE()')])
            ->orderBy('start_date')
            ->all();
        
        $eventsData = [];
        foreach ($events as $event) {
            $date = Yii::$app->formatter->asDate($event->start_date, 'php:Y-m-d');
            $eventsData[$date][] = [
                'id' => $event->id,
                'title' => $event->title,
                'color' => $event->color,
                'location' => $event->location,
                'description' => $event->description,
                'start_date' => Yii::$app->formatter->asDate($event->start_date, 'php:d.m.Y H:i'),
                'time' => date('H:i', strtotime($event->start_date)),
            ];
        }
        
        return $this->render('calendar', [
            'events' => $events,
            'eventsData' => $eventsData,
            'categories' => [
                'Волонтерство' => '#eccc12',
                'Образование' => '#07e074',
                'Акция' => '#cc1a02',
                'Фестиваль' => '#9111cc',
                'Выставка' => '#115ccc',
            ],
            'isGuest' => Yii::$app->user->isGuest,
            'currentUserId' => Yii::$app->user->id,
        ]);
    }
    
    public function actionViewEvent($id)
    {
        $event = Event::findOne($id);
        
        if (!$event) {
            throw new NotFoundHttpException('Событие не найдено');
        }
        
        return $this->render('event-view', [
            'event' => $event
        ]);
    }

    public function actionCreateEvent()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        $model = new Event();

        if ($model->load(Yii::$app->request->post())) {
            $model->start_date = date('Y-m-d H:i:s', strtotime($model->start_date));
            $model->end_date = date('Y-m-d H:i:s', strtotime($model->end_date));
            
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Мероприятие успешно добавлено!');
                return $this->redirect(['calendar']);
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка при добавлении мероприятия: ' . implode(' ', $model->getFirstErrors()));
            }
        }

        return $this->render('create-event', [
            'model' => $model,
        ]);
    }

    public function actionRegistrationConfirmation($id)
    {
        $event = Event::findOne($id);
        if (!$event) {
            throw new NotFoundHttpException('Событие не найдено');
        }

        return $this->render('registration-confirmation', [
            'event' => $event,
        ]);
    }

    public function actionRegisterForEvent()
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->session->setFlash('error', 'Необходимо авторизоваться');
            return $this->redirect(['calendar']);
        }

        $eventId = Yii::$app->request->post('eventId');
        $userId = Yii::$app->user->id;

        $existing = EventRegistration::find()
            ->where(['event_id' => $eventId, 'user_id' => $userId])
            ->exists();

        if ($existing) {
            Yii::$app->session->setFlash('error', 'Вы уже записаны на это событие');
            return $this->redirect(['calendar']);
        }

        $registration = new EventRegistration();
        $registration->event_id = $eventId;
        $registration->user_id = $userId;
        $registration->registration_date = date('Y-m-d H:i:s');

        if ($registration->save()) {
            return $this->redirect(['registration-confirmation', 'id' => $eventId]);
        } else {
            Yii::$app->session->setFlash('error', 'Ошибка при записи');
            return $this->redirect(['calendar']);
        }
    }
}