<?php

namespace lib\application;

use lib\database\BaseActiveRecord;
use lib\database\Client;
use lib\database\Configuration;
use lib\database\DatabaseConnectionManager;
use lib\database\DatabaseConnectionManagerBasic;
use lib\database\PDOClient;
use lib\route\FrontController;
use lib\route\Router;
use lib\route\RouterStandard;
use lib\util\logger\ApplicationLogger;
use lib\util\logger\Logger;
use lib\util\logger\LogLevel;
use lib\view\RenderingEngine;
use lib\view\RenderingEngineHTML;
use function get_called_class;
use function session_start;
use function session_regenerate_id;

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

  private function __construct () {
  }

  public static function boot (): void {
    session_start();
    session_regenerate_id();

    if (static::$instance === null) {
      $class = get_called_class();
      static::$instance = new $class();
    }
    static::$instance->configureSettings();
    static::$instance->init();
  }

  private function init (): void {
    $this->loggerClass = ApplicationLogger::class;
    $this->renderingEngine = new RenderingEngineHTML($this->viewsPath);
    $this->router = new RouterStandard();
    $this->frontController = new FrontController($this->router, $this->renderingEngine);
    $this->databaseManager = new DatabaseConnectionManagerBasic($this->config);
    BaseActiveRecord::setDb(self::getDb());
    $this->configureRoutes($this->router);
    $this->frontController->run();
  }

  abstract protected function configureSettings(): void;

  abstract protected function configureRoutes (Router $router): void;

  public static function log (string $message, $level = LogLevel::ERROR): void {
    Logger::getLogger(static::$instance->loggerClass, $level, static::$instance->logDestination)
      ->log($message);
  }

  public static function getDb (string $adapterClass = PDOClient::class): Client {
    return static::$instance->databaseManager->getClient($adapterClass);
  }
}
