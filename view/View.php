<?php

namespace lib\view;

use Exception;
use function file_exists;
use function file_get_contents;
use function str_replace;

/**
 * View template class. Load a template file with curly braced placeholders.
 * The contents set in the <code>$vars</code> array are then used to fill these placeholders
 * after executing the <code>load()</code> method.
 *
 * @package lib\view
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class View {
  /**
   * @var string
   */
  private $templatesPath;
  /**
   * @var string
   */
  private $file;
  /**
   * @var array
   */
  private $vars;
  /**
   * @var string
   */
  private $html;

  public function __construct (string $pathToTemplates, string $file) {
    $this->templatesPath = $pathToTemplates;
    $this->file = $file;
    $this->vars = [];
  }

  /**
   * Load the template. Replace any curly braced placeholders with the corresponding variable.
   *
   * @throws Exception When template not found
   */
  private function load (): void {
    $file = $this->templatesPath . '/' . $this->file . '.html';

    if (file_exists($file)) {
      $content = file_get_contents($file);

      foreach ($this->vars as $key => $value) {
        $toReplace = '{' . $key . '}';
        $content = str_replace($toReplace, $value, $content);
      }

      $this->html = $content;
    } else {
      throw new Exception('Template not found.');
    }
  }

  public function setVar (string $key, string $value) {
    $this->vars[ $key ] = $value;
  }

  /**
   * @return string
   * @throws Exception When template file not found.
   */
  public function getHtml (): string {
    $this->load();

    return $this->html;
  }
}
