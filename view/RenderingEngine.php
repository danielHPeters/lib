<?php

namespace lib\view;

/**
 * Interface RenderingEngine.
 *
 * @package lib\view
 * @author Daniel Peters
 * @version 1.0
 */
interface RenderingEngine {
  /**
   * @param string $viewName Path to the view file
   * @param array $data Data array with values to replace placeholder variables with.
   *
   * @return string
   */
  public function render (string $viewName, array $data): string;
}
