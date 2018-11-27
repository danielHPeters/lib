<?php

namespace lib\view;

interface RenderingEngine {
  /**
   * @param string $viewPath Path to the view file
   * @param array$data Data array with values to replace placeholder variables with.
   */
  public function render (string $viewPath, array $data): void;
}