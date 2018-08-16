<?php
error_reporting(E_ALL & ~E_NOTICE);
// error_reporting(0);
 
session_start();

$dbcon = array(
    'host'=>'localhost',
    'user'=>'root',
    'pass'=>'',
    'db'=>'decibels',
    // 'host'=>'localhost',
    // 'user'=>'decibels_root',
    // 'pass'=>'C8uvr)_dK8SI',
    // 'db'=>'decibels_neww',
);


require_once __DIR__.'/../vendor/autoload.php';
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

// conecting database 
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'dbs.options' => array (
        'mysql_read' => array(
            'driver'    => 'pdo_mysql',
            'host'      => $dbcon['host'],
            'dbname'    => $dbcon['db'],
            'user'      => $dbcon['user'],
            'password'  => $dbcon['pass'],
            'charset'   => 'utf8',
        ),
    ),
));

/* Global constants */
define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT']);
define('APP_PATH', dirname(ROOT_PATH).DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR);
define('ASSETS_PATH', ROOT_PATH.DIRECTORY_SEPARATOR);

// Register Twig
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

// Register Swiftmailer
$app->register(new Silex\Provider\SwiftmailerServiceProvider());

// Register URL Generator
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

// Register Validator
$app->register(new Silex\Provider\ValidatorServiceProvider());

$app['data_linesup'] = array(
                array(
                    'logo'=>'logo-spjoana.png',
                    'picture'=>'lines-up-1.jpg',
                    ),
                array(
                    'logo'=>'logo-syasmin.png',
                    'picture'=>'lines-up-2.jpg',
                    ),
                 array(
                    'logo'=>'lgo-wink.png',
                    'picture'=>'lines-up-3.jpg',
                    ),
                  array(
                    'logo'=>'lgo-rehab.png',
                    'picture'=>'lines-up-4.jpg',
                    ),
    );
$app['twig'] = $app->share($app->extend('twig', function($twig) {
  $twig->addFilter(new Twig_SimpleFilter('getYoutube', function ($str) {
        parse_str( parse_url( $str, PHP_URL_QUERY ), $my_array_of_vars );
        return $my_array_of_vars['v'];  
  }));
  return $twig;
}));

// $app["twig"] = $app->share($app->extend("twig", function (\Twig_Environment $twig, Silex\Application $app) {
//     $function = new \Twig_Function('getYoutube', function () {
//         parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
//         return $my_array_of_vars['v'];  
//     });
//     $twig->addFunction($function);

//     return $twig;
// }));
// ------------------ Homepage ------------------------
$app->get('/', function () use ($app) {
    $data = $app['db']->fetchAll('SELECT * FROM linesup where `status`=1 order by `sort` asc');

    $sql = "SELECT t.*, p.title, p.content FROM `pg_blog` `t` INNER JOIN pg_blog_description `p` ON t.id = p.blog_id WHERE t.active = 1 AND p.language_id = 2 ORDER BY date_input DESC";
    $dataEvent = $app['dbs']['mysql_read']->fetchAll($sql);

    // $data = $app['data_linesup'];
    return $app['twig']->render('page/home.twig', array(
        'layout' => 'layouts/column1.twig',
        'data'=>$data,
        'dataEvent'=>$dataEvent,
    ));
})
->bind('homepage');

// ------------------ about ------------------
$app->get('/about', function () use ($app) {
    return $app['twig']->render('page/about.twig', array(
        'layout' => 'layouts/inside.twig',
    ));
})
->bind('about');


// ------------------ linesup ------------------
$app->get('/lines_up', function () use ($app) {

    $data = $app['db']->fetchAll('SELECT * FROM linesup where `status`=1 order by `sort` asc');
    
    return $app['twig']->render('page/linesup.twig', array(
        'layout' => 'layouts/inside.twig',
        'data'=>$data,
    ));
})
->bind('lines_up');

// ------------------ tickets ------------------
$app->get('/ticket/list', function () use ($app) {
    $dataAll = $app['db']->fetchAll('SELECT * FROM ticket where `status`=1 order by id asc');
    $jumlah_ticket = count($dataAll);

    return $app['twig']->render('page/tickets.twig', array(
        'layout' => 'layouts/inside.twig',
        'data' => $dataAll,
        'jumlah' => $jumlah_ticket,
    ));
})
->bind('tickets');
$app->get('/ticket', function () use ($app) {
    $dataAll = $app['db']->fetchAll('SELECT * FROM ticket where `status`=1 order by id asc');
    $jumlah_ticket = count($dataAll);

    return $app['twig']->render('page/tickets.twig', array(
        'layout' => 'layouts/inside.twig',
        'data' => $dataAll,
        'jumlah' => $jumlah_ticket,
    ));
})
->bind('ticket');
$app->get('/ticket/home/detailtiket/{id}', function ($id) use ($app) {
    $dataAll = $app['db']->fetchAll('SELECT * FROM ticket where `status`=1 order by id asc');
    $jumlah_ticket = count($dataAll);

    return $app['twig']->render('page/tickets.twig', array(
        'layout' => 'layouts/inside.twig',
        'data' => $dataAll,
        'jumlah' => $jumlah_ticket,
    ));
})
->bind('ticketdetail');

// ------------------ tickets ------------------
$app->get('/show_pticket', function () use ($app) {

    $ids = abs( (int) $_GET['id']);

    $sql = "SELECT * FROM ticket WHERE id = ?";
    $post_tiket = $app['dbs']['mysql_read']->fetchAssoc($sql, array((int) $ids));
    $url_ifrm = $post_tiket['url'];
    $counts_sk = $post_tiket['counters']+1;
    
    mysql_connect('localhost', 'decibels_root', 'C8uvr)_dK8SI');
    mysql_select_db('decibels_neww');
    mysql_query("UPDATE ticket SET counters = $counts_sk WHERE id = $ids");

    $str = '';
    $str .= '<div class="embed-responsive embed-responsive-4by3">
                      <iframe class="embed-responsive-item" src="'.$url_ifrm.'" style="width: 100%; height: 705px;"></iframe>
                    </div>';
    return $str;
})
->bind('show_pticket');

// ------------------ gallery ------------------
$app->get('/gallery', function () use ($app) {

    $sql = "SELECT t.*, p.title, p.content FROM `video` `t` INNER JOIN video_description `p` ON t.id = p.video_id WHERE t.active = 1 AND p.language_id = 2 ORDER BY sort DESC";
    $dataVideo = $app['dbs']['mysql_read']->fetchAll($sql);

    return $app['twig']->render('page/gallery.twig', array(
        'layout' => 'layouts/inside.twig',
        'dataVideo' => $dataVideo,
    ));
})
->bind('gallery');

// ------------------ partners ------------------
$app->get('/partners', function () use ($app) {

    return $app['twig']->render('page/partners.twig', array(
        'layout' => 'layouts/inside.twig',
    ));
})
->bind('partners');

// ------------------ accommodation ------------------
$app->get('/accommodation', function () use ($app) {

    return $app['twig']->render('page/accommodation.twig', array(
        'layout' => 'layouts/inside.twig',
    ));
})
->bind('accommodation');

// ------------------ roadto ------------------
$app->get('/roadto', function () use ($app) {

    return $app['twig']->render('page/roadto.twig', array(
        'layout' => 'layouts/inside.twig',
    ));
})
->bind('roadto');
// ------------------ roadto ------------------
$app->get('/contact', function () use ($app) {

    return $app['twig']->render('page/contact.twig', array(
        'layout' => 'layouts/inside.twig',
    ));
})
->bind('contact');

$app->get('/tos', function () use ($app) {

    return $app['twig']->render('page/tos.twig', array(
        'layout' => 'layouts/inside.twig',
    ));
})
->bind('tos');

$app->error(function (\Exception $e, $code) use ($app) {
    switch ($code) {
        case 404:
            $message = 'The requested page could not be found.';
            break;
        default:
            $message = 'We are sorry, but something went terribly wrong.';
    };
    return $app['twig']->render('page/error.twig', array(
        'layout' => 'layouts/inside.twig',
        'e'=>$e,
        'code'=>$code,
        'message'=>$message,
    ));
});

$app['debug'] = false;

$app->run();