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
  const NAME = 'name';
  const FOR = 'for';

  const ACCEPT = [
    self::NAME => 'accept',
    self::FOR => [
      Tag::INPUT
    ]
  ];
  const ACCEPT_CHARSET = [
    self::NAME => 'accept-charset',
    self::FOR => [
      Tag::FORM
    ]
  ];
  const ACTION = [
    self::NAME => 'action',
    self::FOR => [
      Tag::FORM
    ]
  ];
  const ALT = [
    self::NAME => 'alt',
    self::FOR => [
      Tag::AREA,
      Tag::IMG,
      Tag::INPUT
    ]
  ];
  const ASYNC = [
    self::NAME => 'async',
    self::FOR => [
      Tag::SCRIPT
    ]
  ];
  const AUTOCOMPLETE = [
    self::NAME => 'autocomplete',
    self::FOR => [
      Tag::FORM,
      Tag::INPUT
    ]
  ];
  const AUTOFOCUS = [
    self::NAME => 'autofocus',
    self::FOR => [
      Tag::BUTTON,
      Tag::INPUT,
      Tag::KEYGEN,
      Tag::SELECT,
      Tag::TEXTAREA
    ]
  ];
  const AUTOPLAY = [
    self::NAME => 'autoplay',
    self::FOR => [
      Tag::AUDIO,
      Tag::VIDEO
    ]
  ];
  const CHALLENGE = [
    self::NAME => 'challenge',
    self::FOR => [
      Tag::KEYGEN
    ]
  ];
  const CHARSET = [
    self::NAME => 'charset',
    self::FOR => [
      Tag::META,
      Tag::SCRIPT
    ]
  ];
  const CHECKED = [
    self::NAME => 'checked',
    self::FOR => [
      Tag::INPUT
    ]
  ];
  const CITE = [
    self::NAME => 'cite',
    self::FOR => [
      Tag::BLOCKQUOTE,
      Tag::DEL,
      Tag::INS,
      Tag::Q
    ]
  ];
  const COLS = [
    self::NAME => 'cols',
    self::FOR => [
      Tag::TEXTAREA
    ]
  ];
  const COLSPAN = [
    self::NAME => 'colspan',
    self::FOR => [
      Tag::TD,
      Tag::TH
    ]
  ];
  const CONTENT = [
    self::NAME => 'content',
    self::FOR => [
      Tag::META
    ]
  ];
  const CONTROLS = [
    self::NAME => 'controls',
    self::FOR => [
      Tag::AUDIO,
      Tag::VIDEO
    ]
  ];
  const COORDS = [
    self::NAME => 'coords',
    self::FOR => [Tag::AREA
    ]
  ];
  const DATA = [
    self::NAME => 'data',
    self::FOR => [
      Tag::OBJECT
    ]
  ];
  const DATETIME = [
    self::NAME => 'datetime',
    self::FOR => [
      Tag::DEL,
      Tag::INS,
      Tag::TIME
    ]
  ];
  const DEFAULT_ = [
    self::NAME => 'default',
    self::FOR => [
      Tag::TRACK
    ]
  ];
  const DEFER = [
    self::NAME => 'defer',
    self::FOR => [
      Tag::SCRIPT
    ]
  ];
  const DIRNAME = [
    self::NAME => 'dirname',
    self::FOR => [
      Tag::INPUT,
      Tag::TEXTAREA
    ]
  ];
  const DISABLED = [
    self::NAME => 'disabled',
    self::FOR => [
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
  const DOWNLOAD = [
    self::NAME => 'download',
    self::FOR => [
      Tag::A,
      Tag::AREA
    ]
  ];
  const ENCTYPE = [
    self::NAME => 'enctype',
    self::FOR => [
      Tag::FORM
    ]
  ];
  const FOR_ = [
    self::NAME => 'for',
    self::FOR => [
      Tag::LABEL,
      Tag::OUTPUT
    ]
  ];
  const FORM = [
    self::NAME => 'form',
    self::FOR => [
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
  const FORMACTION = [
    self::NAME => 'formaction',
    self::FOR => [
      Tag::BUTTON,
      Tag::INPUT
    ]
  ];
}
