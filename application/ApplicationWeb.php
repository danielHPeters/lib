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
use lib\view\RenderingEngine;
use lib\view\RenderingEngineHTML;
use function session_start;
use function session_regenerate_id;
use function session_write_close;

/**
 * Class ApplicationWeb.
 *
 * @package lib\application
 * @author Daniel Peters
 * @version 1.0
 */
abstract class ApplicationWeb implements Application {
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

  /**
   * @var string
   */
  protected $viewsPath;

  /**
   * @var RenderingEngine
   */
  protected $renderingEngine;

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
    $this->renderingEngine = new RenderingEngineHTML($this->viewsPath);
    $this->router = new RouterStandard();
    $this->frontController = new FrontController($this->router, $this->renderingEngine);
    $this->databaseManager = new DatabaseConnectionManagerBasic($this->config);
    $this->configureRoutes($this->router);
    $this->frontController->run();
  }

  abstract protected function configureRoutes (Router $router): void;

  public static function log (string $message, $level = LogLevel::ERROR): void {
    Logger::getLogger(static::$instance->loggerClass, $level, static::$instance->logDestination)
      ->log($message);
  }

  public static function getAdapter (string $adapterClass = PDOAdapter::class): Adapter {
    return static::$instance->databaseManager->getAdapter($adapterClass);
  }
}
