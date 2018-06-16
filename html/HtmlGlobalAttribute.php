<?php

namespace lib\html;

use lib\util\Enum;

/**
 * Class HtmlGlobalAttribute.
 *
 * @package lib\html
 * @author Daniel Peters
 * @version 1.0
 */
abstract class HtmlGlobalAttribute extends Enum {
	const ACCESSKEY = 'accesskey';
	const CLASS_ = 'class';
	const CONTENTEDITABLE = 'contenteditable';
	const CONTEXTMENU = 'contextmenu';
	const CUSTOM = 'data-';
	const DIR = 'dir';
	const DRAGGABLE = 'draggable';
	const DROPZONE = 'dropzone';
	const HIDDEN = 'hidden';
	const ID = 'id';
	const LANG = 'lang';
	const SPELLCHECK = 'spellcheck';
	const STYLE = 'style';
	const TABINDEX = 'tabindex';
	const TITLE = 'title';
	const TRANSLATE = 'translate';
}
