<?php

namespace lib\view;

use Exception;

/**
 * Class RenderingEngineHTML.
 *
 * @package lib\view
 * @author  Daniel Peters
 * @version 1.0
 */
class RenderingEngineHTML implements RenderingEngine {
  /**
   * @var string
   */
  private $viewsPath;

  /**
   * RenderingEngineHTML constructor.
   *
   * @param string $viewsPath Path to views root
   */
  public function __construct (string $viewsPath) {
    $this->viewsPath = $viewsPath;
  }

  /**
   * @param string $viewName Path to the view file
   * @param array $data      Data array with values to replace placeholder variables with.
   *
   * @return string View loaded as string
   */
  public function render (string $viewName, array $data = []): string {
    $view = new View($this->viewsPath, $viewName);
    $view->setVars($data);

    $data = '';

    try {
      $data = $view->render(false);
    } catch (Exception $e) {
    }

    return $data;
  }
}
