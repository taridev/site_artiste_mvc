<?php

namespace App;

use Core\Config;
use Core\Database\MysqlDatabase;

class App
{

    public $title = 'Site Artiste MVC';
    private static $instance_;
    private $db_instance;
    const OEUVRE_PATH = 'oeuvre/';

    /**
     * Retourne l'instance de l'application si elle existe déjà
     * ou bien crée cette instance.
     *
     * @return App
     */
    public static function getInstance()
    {
        if (is_null(self::$instance_)) {
            self::$instance_ = new App();
        }
        return self::$instance_;
    }

    /**
     * Appel des différents autoloader (Core & App)
     *
     * @return void
     */
    public static function load()
    {
        session_start();
        require ROOT . '/app/Autoloader.php';
        Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        \Core\Autoloader::register();
    }

    public function getTable($name)
    {
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }

    public function getDb()
    {
        $config = Config::getInstance(ROOT . '/config/config.php');
        if ($this->db_instance === null) {
            $this->db_instance = new MysqlDatabase(
                $config->get('db_name'),
                $config->get('db_user'),
                $config->get('db_pass'),
                $config->get('db_host')
            );
        }
        return $this->db_instance;
    }
}
