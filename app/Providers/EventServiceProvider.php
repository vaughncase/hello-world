<?php

namespace App\Providers;

use App\Events\Activity\DiningNotification;
use App\Events\Activity\DiningTimeline;
use App\Events\Activity\HygienicNotification;
use App\Events\Activity\HygienicTimeline;
use App\Events\Activity\LearnNotification;
use App\Events\Activity\LearnTimeline;
use App\Events\Activity\SleepNotification;
use App\Events\Activity\SleepTimeline;
use App\Events\School\Album\DeleteAlbum;
use App\Events\School\Album\PublishNewAlbum;
use App\Events\School\Album\UpdateAlbum;
use App\Events\School\Post\DeletePost;
use App\Events\School\Post\PublishNewPost;
use App\Events\School\Post\UpdatePost;
use App\Events\Ticket\UpdateMedicineFeedback;
use App\Listeners\Activity\DiningNotificationListener;
use App\Listeners\Activity\DiningTimelineListener;
use App\Listeners\Activity\HygienicNotificationListener;
use App\Listeners\Activity\HygienicTimelineListener;
use App\Listeners\Activity\LearnNotificationListener;
use App\Listeners\Activity\LearnTimelineListener;
use App\Listeners\Activity\SleepNotificationListener;
use App\Listeners\Activity\SleepTimelineListener;
use App\Listeners\Post\DeletePostListener;
use App\Listeners\Post\HandleQueueWhenPublishNewPost;
use App\Listeners\Post\UpdatePostListener;
use App\Listeners\School\Album\DeleteAlbumListener;
use App\Listeners\School\Album\HandleQueueWhenPublishNewAlbum;
use App\Listeners\School\Album\UpdateAlbumListener;
use App\Listeners\Ticket\UpdateMedicineFeedbackListener;
use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\ExampleEvent::class => [
            \App\Listeners\ExampleListener::class,
        ],
        UpdateMedicineFeedback::class   => [
            UpdateMedicineFeedbackListener::class,
        ],
        HygienicNotification::class     => [
            HygienicNotificationListener::class,
        ],
        HygienicTimeline::class         => [
            HygienicTimelineListener::class,
        ],
        DiningNotification::class       => [
            DiningNotificationListener::class,
        ],
        DiningTimeline::class           => [
            DiningTimelineListener::class,
        ],
        SleepNotification::class        => [
            SleepNotificationListener::class,
        ],
        SleepTimeline::class            => [
            SleepTimelineListener::class,
        ],
        LearnNotification::class        => [
            LearnNotificationListener::class,
        ],
        LearnTimeline::class            => [
            LearnTimelineListener::class,
        ],
        PublishNewPost::class           => [
            HandleQueueWhenPublishNewPost::class,
        ],
        UpdatePost::class               => [
            UpdatePostListener::class,
        ],
        DeletePost::class               => [
            DeletePostListener::class,
        ],
        PublishNewAlbum::class          => [
            HandleQueueWhenPublishNewAlbum::class,
        ],
        DeleteAlbum::class              => [
            DeleteAlbumListener::class,
        ],
        UpdateAlbum::class              => [
            UpdateAlbumListener::class,
        ],
    ];

}
