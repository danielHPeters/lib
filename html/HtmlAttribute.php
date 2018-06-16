<?php

namespace lib\html;

use lib\util\Enum;

/**
 * Reference of html attributes with their corresponding tags.
 *
 * @package lib\html
 * @author Daniel Peters
 * @version 1.0
 */
class HtmlAttribute extends Enum {
	const ACCEPT = [ 'name' => 'accept', 'for' => [ Tag::INPUT ] ];
	const ACCEPT_CHARSET = [ 'name' => 'accept-charset', 'for' => [ Tag::FORM ] ];
	const ACTION = [ 'name' => 'action', 'for' => [ Tag::FORM ] ];
	const ALT = [ 'name' => 'alt', 'for' => [ Tag::AREA, Tag::IMG, Tag::INPUT ] ];
	const ASYNC = [ 'name' => 'async', 'for' => [ Tag::SCRIPT ] ];
	const AOUTOCOMPLETE = [ 'name' => 'autocomplete', 'for' => [ Tag::FORM, Tag::INPUT ] ];
	const AUTOFOCUS = [
		'name' => 'autofocus',
		'for'  => [
			Tag::BUTTON,
			Tag::INPUT,
			Tag::KEYGEN,
			Tag::SELECT,
			Tag::TEXTAREA
		]
	];
	const AUTOPLAY = [ 'name' => 'autoplay', 'for' => [ Tag::AUDIO, Tag::VIDEO ] ];
	const CHALLENGE = [ 'name' => 'challenge', 'for' => [ Tag::KEYGEN ] ];
	const CHARSET = [ 'name' => 'charset', 'for' => [ Tag::META, Tag::SCRIPT ] ];
	const CHECKED = [ 'name' => 'checked', 'for' => [ Tag::INPUT ] ];
	const CITE = [
		'name' => 'cite',
		'for'  => [
			Tag::BLOCKQUOTE,
			Tag::DEL,
			Tag::INS,
			Tag::Q
		]
	];
	const COLS = [ 'name' => 'cols', 'for' => [ Tag::TEXTAREA ] ];
	const COLSPAN = [ 'name' => 'colspan', 'for' => [ Tag::TD, Tag::TH ] ];
	const CONTENT = [ 'name' => 'content', 'for' => [ Tag::META ] ];
	const CONTROLS = [ 'name' => 'controls', 'for' => [ Tag::AUDIO, Tag::VIDEO ] ];
	const COORDS = [ 'name' => 'coords', 'for' => [ Tag::AREA ] ];
	const DATA = [ 'name' => 'data', 'for' => [ Tag::OBJECT ] ];
	const DATETIME = [ 'name' => 'datetime', 'for' => [ Tag::DEL, Tag::INS, Tag::TIME ] ];
	const DEFAULT_ = [ 'name' => 'default', 'for' => [ Tag::TRACK ] ];
	const DEFER = [ 'name' => 'defer', 'for' => [ Tag::SCRIPT ] ];
	const DIRNAME = [ 'name' => 'dirname', 'for' => [ Tag::INPUT, Tag::TEXTAREA ] ];
	const DISABLED = [
		'name' => 'disabled',
		'for'  => [
			Tag::BUTTON,
			Tag::FIELDSET,
			Tag::INPUT,
			Tag::KEYGEN,
			Tag::OPTGROUP,
			Tag::OPTION,
			Tag::SELECT,
			Tag::TEXTAREA
		]
	];
	const DOWNLOAD = [ 'name' => 'download', 'for' => [ Tag::A, Tag::AREA ] ];
	const ENCTYPE = [ 'name' => 'enctype', 'for' => [ Tag::FORM ] ];
	const FOR_ = [ 'name' => 'for', 'for' => [ Tag::LABEL, Tag::OUTPUT ] ];
	const FORM = [
		'name' => 'form',
		'for'  => [
			Tag::BUTTON,
			Tag::FIELDSET,
			Tag::INPUT,
			Tag::KEYGEN,
			Tag::LABEL,
			Tag::METER,
			Tag::OBJECT,
			Tag::OUTPUT,
			Tag::SELECT,
			Tag::TEXTAREA
		]
	];
	const FORMACTION = [ 'name' => 'formaction', 'for' => [ Tag::BUTTON, Tag::INPUT ] ];
}
