<?php

namespace lib\application;

use lib\database\Adapter;
use lib\database\Configuration;
use lib\database\DatabaseConnectionManager;
use lib\database\DatabaseConnectionManagerBasic;
use lib\database\PDOAdapter;
use lib\route\FrontController;
use lib\route\Router;
use lib\route\RouterStandard;
use lib\util\logger\ApplicationLogger;
use lib\util\logger\Logger;
use lib\util\logger\LogLevel;
use function get_called_class;

class ApplicationWeb implements Application {
  /**
   * @var ApplicationWeb
   */
  protected static $instance;

  /**
   * @var Router
   */
  protected $router;

  /**
   * @var FrontController
   */
  protected $frontController;

  /**
   * @var DatabaseConnectionManager
   */
  protected $databaseManager;

  /**
   * @var Configuration
   */
  protected $config;
  /**
   * @var string
   */
  protected $logDestination;
  /**
   * @var string
   */
  protected $loggerClass;

  protected function __construct () {
  }

  public static function boot (): void {
    if (static::$instance === null) {
      $class = get_called_class();
      static::$instance = new $class();
    }
    session_start();
    session_regenerate_id(true);
    static::$instance->init();
    session_write_close();
  }

  private function init (): void {
    $this->loggerClass = ApplicationLogger::class;
    $this->router = new RouterStandard();
    $this->frontController = new FrontController($this->router);
    $this->databaseManager = new DatabaseConnectionManagerBasic($this->config);
    $this->configureRoutes($this->router);
    $this->frontController->run();
  }

  protected function configureRoutes (Router $router): void {

  }

  public static function log (string $message, $level = LogLevel::ERROR): void {
    Logger::getLogger(static::$instance->loggerClass, $level, static::$instance->logDestination)
      ->log($message);
  }

  public static function getAdapter (string $adapterClass = PDOAdapter::class): Adapter {
    return static::$instance->databaseManager->getAdapter($adapterClass);
  }
}