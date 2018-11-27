<?php

namespace lib\view;

class RenderingEngineHTML implements RenderingEngine {
  /**
   * @var string
   */
  private $viewsPath;

  public function __construct (string $viewsPath) {
    $this->viewsPath = $viewsPath;
  }

  /**
   * @param string $viewPath Path to the view file
   * @param array $data Data array with values to replace placeholder variables with.
   */
  public function render (string $viewPath, array $data): void {
    // TODO: Implement render() method.
  }
}