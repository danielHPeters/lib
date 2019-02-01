<?php

namespace lib\file;

use lib\util\Enum;

/**
 * Class FileExtension.
 *
 * @package lib\file
 * @author Daniel Peters
 * @version 1.0
 */
abstract class FileExtension extends Enum {
  const PHP = 'php';
  const TS = 'ts';
  const JAVA = 'java';
  const JAR = 'jar';
  const FXML = 'fxml';
  const JAVASCRIPT = 'js';
  const JSON = 'json';
  const XML = 'xml';
  const HTML = 'html';
  const CSS = 'css';
  const C = 'c';
  const H = 'h';
  const CPP = 'cpp';
  const HPP = 'hpp';
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
  const TAR = 'tar';
}
