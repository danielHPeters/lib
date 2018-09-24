<?php

namespace lib\file;

use lib\util\Enum;

/**
 * Enum class MIMEType.
 *
 * @package lib\file
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class MIMEType extends Enum {
  const TEXT = 'text/plain';
  const CSV = 'text/csv';
  const DOC = 'application/msword';
  const DOCX = 'application/vnd.openxmlformats-officedocument.wordprocessingm';
  const JPEG = 'image/jpeg';
  const ECMASCRIPT = 'application/ecmascript';
  const JAVASCRIPT = 'application/javascript';
  const MPEG_AUDIO = 'audio/mpeg';
  const MPEG_VIDEO = 'video/mpeg';
  const MIDI = 'audio/midi';
  const X_MID = 'audio/x-mid';
  const X_MIDI = 'audio/x-midi';
  const MIME = 'www/mime';
  const PDF = 'application/pdf';
  const QUICKTIME = 'video/quicktime';
  const PASCAL = 'text/pascal';
  const X_PASCAL = 'text/x-pascal';
  const PICT = 'image/pict';
  const PNG = 'image/png';
  const POSTSCRIPT = 'application/postscript';
  const RICHTEXT = 'text/richtext';
  const AAC = 'audio/aac';
  const TIFF = 'image/tiff';
  const GIF = 'image/gif';
  const WAV = 'audio/wav';
  const AVI = 'video/msvideo';
  const EXCEL = 'application/excel';
  const X_EXCEL = 'application/x-excel';
  const ZIP = 'application/zip';
  const X_ZIP = 'multipart/x-zip';
  const BASE64 = 'application/base64';
  const HTML = 'text/html';
  const JSON = 'application/json';
  const ODT = 'application/vnd.oasis.opendocument.text';
  const OGA = 'audio/ogg';
  const OGV = 'video/ogg';
  const CSS = 'text/css';
  const JAR = 'application/java-archive';
  const SH = 'application/x-sh';
  const TAR = 'application/x-tar';
  const XML = 'application/xml';
  const SEVEN_ZIP = 'application/x-7z-compressed';
  const SVG = 'image/svg+xml';
  const SWF = 'application/x-shockwave-flash';
}
