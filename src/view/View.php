<?php

namespace lib\view;

use Exception;
use function file_exists;
use function file_get_contents;
use function str_replace;
use function htmlspecialchars;
use function strstr;
use function preg_match;

/**
 * View template class. Load a template file with curly braced placeholders.
 * The contents set in the <code>$vars</code> array are then used to fill these placeholders
 * after executing the <code>load()</code> method.
 *
 * @package lib\view
 * @author  Daniel Peters
 * @version 1.0
 */
class View {
  /**
   * @var string
   */
  private $templatesPath;

  /**
   * @var View
   */
  private $parent;
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
      $this->html = $content;
    } else {
      throw new Exception('Template not found.');
    }
  }

  /**
   * @param bool $escape
   * @throws Exception
   */
  private function prepareView (bool $escape): void {
    $extendPattern = "/^\@extend\:\:\w+$/m";
    $firstLine = strstr($this->html, "\n", true);

    if (preg_match($extendPattern, $firstLine)) {
      $this->html = str_replace($firstLine . "\n", '', $this->html);
      $parentFile = str_replace('@extend::', '', $firstLine);
      $this->parent = new View($this->templatesPath, $parentFile);
    }

    if ($this->parent) {
      $this->parent->setVars($this->vars);
      $this->parent->load();
      $this->parent->html = str_replace('@child', $this->html, $this->parent->html);
      $this->parent->prepareView($escape);
      $this->html = $this->parent->html;
    } else {
      foreach ($this->vars as $key => $value) {
        $toReplace = '{' . $key . '}';
        $this->html = str_replace($toReplace, $escape ? htmlspecialchars($value) : $value, $this->html);
      }
    }
  }

  public function setVars (array $map): void {
    foreach ($map as $key => $value) {
      $this->setVar($key, $value);
    }
  }

  public function setVar (string $key, string $value): void {
    $this->vars[$key] = $value;
  }

  /**
   * @param bool $escape Tell rendering engine if it should escape data.
   *
   * @return string
   * @throws Exception When template file not found.
   */
  public function render (bool $escape = true): string {
    $this->load();
    $this->prepareView($escape);

    return $this->html;
  }
}
