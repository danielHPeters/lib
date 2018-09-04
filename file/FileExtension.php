<?php

namespace lib\file;

use lib\util\Enum;

/**
 * Class FileExtension.
 *
 * @package lib\file
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
abstract class FileExtension extends Enum {
  const PHP = 'php';
  const JAVA = 'java';
  const JAR = 'jar';
  const FXML = 'fxml';
  const JAVASCRIPT = 'js';
  const JSON = 'json';
  const XML = 'xml';
  const HTML = 'html';
  const CSS = 'css';
  const C_SOURCE = 'c';
  const C_HEADER = 'h';
  const CPP_SOURCE = 'cpp';
  const CPP_HEADER = 'hpp';
  const PUG = 'pug';
  const EJS = 'ejs';
  const ODT = 'odt';
  const ODS = 'ods';
  const ODP = 'odp';
  const ODG = 'odg';
  const DOCX = 'docx';
  const PPTX = 'pptx';
  const ZIP = 'zip';
  const PNG = 'png';
  const JPG = 'jpg';
  const JPEG = 'jpeg';
  const PDF = 'pdf';
  const SEVEN_ZIP = '7zip';
  const RAR = 'rar';
}
