<?php

namespace lib\view;

interface RenderingEngine {
  /**
   * @param string $viewName Path to the view file
   * @param array $data Data array with values to replace placeholder variables with.
   *
   * @return string
   */
  public function render (string $viewName, array $data): string ;
}
