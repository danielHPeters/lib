<?php

namespace lib\file;
use lib\util\Enum;

/**
 * Enum class MIMEType.
 *
 * @package lib\file
 * @author Daniel Peters
 * @version 1.0
 */
class MIMEType extends Enum {
	const TEXT = 'text/plain';
	const TEXT_APPLICATION = 'application/plain';
	const JPEG = 'image/jpeg';
	const ECMASCRIPT = 'application/ecmascript';
	const JAVASCRIPT = 'application/javascript';
	const ECMASCRIPT_TEXT = 'text/ecmascript';
	const JAVASCRIPT_TEXT = 'text/javascript';
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
	const TIFF = 'image/tiff';
	const WAV = 'audio/wav';
	const EXCEL = 'application/excel';
	const X_EXCEL = 'application/x-excel';
	const ZIP = 'application/zip';
	const X_ZIP = 'multipart/x-zip';
	const XML = 'text/xml';
	const BASE64 = 'application/base64';
	const HTML = 'text/html';
	const JSON = 'application/json';
}
