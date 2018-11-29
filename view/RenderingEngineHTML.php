<?php

namespace lib\view;

use Exception;

class RenderingEngineHTML implements RenderingEngine {
  /**
   * @var string
   */
  private $viewsPath;

  public function __construct (string $viewsPath) {
    $this->viewsPath = $viewsPath;
  }

  /**
   * @param string $viewName Path to the view file
   * @param array $data Data array with values to replace placeholder variables with.
   *
   * @return string
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
