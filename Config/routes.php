<?php
    /**
     * Routes configuration
     *
     * In this file, you set up routes to your controllers and their actions.
     * Routes are very important mechanism that allows you to freely connect
     * different URLs to chosen controllers and their actions (functions).
     *
     * @link          http://cakephp.org CakePHP(tm) Project
     * @package       app.Config
     * @since         CakePHP(tm) v 0.2.9
     */

    /**
     * Custom routes
     */

    // Index
    Router::connect('/', array('controller' => 'index', 'action' => 'index'));

    // Miscellaneous
    Router::connect('/about', array('controller' => 'index', 'action' => 'about'));

    // Users
    Router::connect('/register', array('controller' => 'users', 'action' => 'register'));
    Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
    Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));

    // Sightings
    Router::connect('/images', array('controller' => 'images', 'action' => 'images'));
    Router::connect('/images/manage', array('controller' => 'images', 'action' => 'manage'));
    Router::connect('/images/hash', array('controller' => 'images', 'action' => 'hash'));
    Router::connect('/images/media', array('controller' => 'images', 'action' => 'media'));
    Router::connect('/images/:image_id', array('controller' => 'images', 'action' => 'image'));


    /**
     * Load all plugin routes. See the CakePlugin documentation on
     * how to customize the loading of plugin routes.
     */
    CakePlugin::routes();

    /**
     * Load the CakePHP default routes. Only remove this if you do not want to use
     * the built-in default routes.
     */
    require CAKE . 'Config' . DS . 'routes.php';
