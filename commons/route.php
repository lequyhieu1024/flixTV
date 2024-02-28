<?php

use App\Controllers\Admin\CommentsController;
use App\Controllers\Admin\GenresController as AdminGenresController;
use App\Controllers\Admin\HomeController as AdminHomeController;
use App\Controllers\Admin\MoviesController;
use App\Controllers\Admin\UsersController;
use App\Controllers\Client\GenresController;
use App\Controllers\Client\HomeController;
use App\Controllers\Client\MovieController;
use App\Controllers\Client\UserController;
use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function () {
    if (!isset($_SESSION['auth']) || empty($_SESSION['auth'])) {
        header('location: ' . BASE_URL . 'login');
        die;
    }
});

//trang admin
// thêm 'before' => 'auth' sau prefix => admin để check auth
$router->group(['prefix' => 'admin'], function ($router) {
    // index
    $router->get('/', [AdminHomeController::class, 'index']);
    //movies 
    $router->group(['prefix' => 'movies'], function ($router) {
        $router->get('/', [MoviesController::class, 'index']);
        $router->get('add', [MoviesController::class, 'create']);
        $router->post('add', [MoviesController::class, 'store']);
        $router->get('edit/{id}', [MoviesController::class, 'edit']);
        $router->post('edit/{id}', [MoviesController::class, 'update']);
        $router->get('delete/{id}', [MoviesController::class, 'destroy']);
        $router->get('update-flag/{id}/{flag}', [MoviesController::class, 'updateFlag']);
    });
    $router->group(['prefix' => 'genres'], function ($router) {
        $router->get('/', [AdminGenresController::class, 'index']);
        $router->get('add', [AdminGenresController::class, 'create']);
        $router->post('add', [AdminGenresController::class, 'store']);
        $router->get('edit/{id}', [AdminGenresController::class, 'edit']);
        $router->post('edit/{id}', [AdminGenresController::class, 'update']);
        $router->get('delete/{id}', [AdminGenresController::class, 'destroy']);
        $router->get('update-flag/{id}/{flag}', [AdminGenresController::class, 'updateFlag']);
    });
    $router->group(['prefix' => 'users'], function ($router) {
        $router->get('/', [UsersController::class, 'index']);
        $router->get('delete/{id}', [UsersController::class, 'destroy']);
    });
    $router->group(['prefix' => 'comments'], function ($router) {
        $router->get('/', [CommentsController::class, 'index']);
        $router->get('delete/{id}', [CommentsController::class, 'destroy']);
    });
});



//trang chủ
$router->get('/', [HomeController::class, 'index']);
// chi tiết phim
$router->get('detail/{id}/{slug}', [MovieController::class, 'detail']);
//phim theo thể loại
$router->get('movies-by-genres', [MovieController::class, 'moviesByGenres']);
//danh sách thể loại
$router->get('list-genres', [GenresController::class, 'list']);
// about us
$router->get('about-us', [HomeController::class, 'aboutUs']);
//contact
$router->get('contact', [HomeController::class, 'contact']);
//privacy
$router->get('privacy', [HomeController::class, 'privacy']);
//đăng nhập
$router->get('sign-up', [UserController::class, 'signUp']);
//đăng kí
$router->get('sign-in', [UserController::class, 'signIn']);
//quên mk
$router->get('profile', [UserController::class, 'profile']);
//quên mk
$router->get('forgot-password', [UserController::class, 'forgotPassword']);
//404
$router->get('404', [HomeController::class, 'error']);


# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;
