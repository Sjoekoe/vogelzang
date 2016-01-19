<?php

namespace Vogelzang\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Vogelzang\Models\Contact;
use Vogelzang\Models\Horse;
use Vogelzang\Models\Horsepicture;
use Vogelzang\Models\Item;
use Vogelzang\Models\Itemphoto;
use Vogelzang\Models\Lesson;
use Vogelzang\Models\Pony;
use Vogelzang\Models\Rider;
use Vogelzang\Models\Roster;
use Vogelzang\Models\Subscription;
use Vogelzang\User;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Vogelzang\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        $router->model('contact', Contact::class);
        $router->model('horse', Horse::class);
        $router->model('horse_picture', Horsepicture::class);
        $router->model('item', Item::class);
        $router->model('item_photo', Itemphoto::class);
        $router->model('lesson', Lesson::class);
        $router->model('pony', Pony::class);
        $router->model('rider', Rider::class);
        $router->model('roster', Roster::class);
        $router->model('subscription', Subscription::class);
        $router->model('user', User::class);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
