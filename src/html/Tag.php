<?php

namespace lib\html;

use lib\util\Enum;

/**
 * Class Tag.
 *
 * @package lib\html
 * @author Daniel Peters
 * @version 1.0
 */
abstract class Tag extends Enum {
  const HTML = 'html';
  const HEAD = 'head';
  const BODY = 'body';
  const SCRIPT = 'script';
  const META = 'meta';
  const BASE = 'base';

  /**
   * Link to external resource.
   */
  const LINK = 'link';
  const BR = 'br';
  const HR = 'hr';
  const IMG = 'img';
  const P = 'p';
  const A = 'a';
  const FORM = 'form';
  const INPUT = 'input';

  /**
   * Key-pair generator field.
   */
  const KEYGEN = 'keygen';

  /**
   * Result for calculation.
   */
  const OUTPUT = 'output';
  const TEXTAREA = 'textarea';

  /**
   * Group elements in a form.
   */
  const FIELDSET = 'fieldset';

  /**
   * Label for input element.
   */
  const LABEL = 'label';

  /**
   * Caption for fieldset element
   */
  const LEGEND = 'legend';
  const SELECT = 'select';
  const DATALIST = 'datalist';
  const OPTION = 'option';

  /**
   * Group related options.
   */
  const OPTGROUP = 'optgroup';
  const BUTTON = 'button';
  const H1 = 'h1';
  const H2 = 'h2';
  const H3 = 'h3';
  const H4 = 'h4';
  const H5 = 'h5';
  const H6 = 'h6';

  /**
   * Unordered list.
   */
  const UL = 'ul';

  /**
   * Ordered list.
   */
  const OL = 'ol';

  /**
   * List item.
   */
  const LI = 'li';
  const STRONG = 'strong';
  const MARK = 'mark';
  const ABBR = 'abbr';
  const ADDRESS = 'address';
  const MAP = 'map';
  const AREA = 'area';
  const DIV = 'div';
  const ARTICLE = 'article';
  const ASIDE = 'aside';
  const HEADER = 'header';
  const SECTION = 'section';
  const FOOTER = 'footer';

  /**
   * Main content container for page.
   */
  const MAIN = 'main';
  const NAV = 'nav';
  const AUDIO = 'audio';

  /**
   * Bold Text.
   */
  const B = 'b';

  /**
   * Emphasized Text.
   */
  const EM = 'em';

  /**
   * Subscript text.
   */
  const SUB = 'sub';
  const I = 'i';
  const BDI = 'bdi';
  const BDO = 'bdo';
  const SPAN = 'span';
  const BLOCKQUOTE = 'blockquote';
  const CANVAS = 'canvas';
  const CITE = 'cite';
  const CODE = 'code';

  /**
   * Table caption.
   */
  const CAPTION = 'caption';
  const COLGROUP = 'colgroup';
  const COL = 'col';
  const DL = 'dl';
  const DT = 'dt';
  const DD = 'dd';
  const DEL = 'del';
  const INS = 'ins';
  const SMALL = 'small';
  const DETAILS = 'details';
  const DFN = 'dfn';
  const DIALOG = 'dialog';

  /**
   * Container for external application.
   */
  const EMBED = 'embed';
  const FIGURE = 'figure';
  const FIGCAPTION = 'figcaption';
  const IFRAME = 'iframe';

  /**
   * Define Keyboard input.
   */
  const KBD = 'kbd';

  /**
   * Menu with commands.
   */
  const MENU = 'menu';

  /**
   * Command for menu.
   */
  const MENUITEM = 'menuitem';

  /**
   * Measure data within range (gauge).
   */
  const METER = 'meter';

  /**
   * Alternate content for user without client-side scripts enabled.
   */
  const NOSCRIPT = 'noscript';

  /**
   * Defines an embedded object. Use for PDF, Flash, Java applets, external page etc.
   */
  const OBJECT = 'object';

  /**
   * Define a parameter for an object.
   */
  const PARAM = 'param';

  /**
   * Container for multiple image resources. Use for responsive pages.
   */
  const PICTURE = 'picture';

  /**
   * Pre formatted text.
   */
  const PRE = 'pre';
  const TIME = 'time';

  /**
   * Representate the progress of a task.
   */
  const PROGRESS = 'progress';

  /**
   * Short quotation.
   */
  const Q = 'q';

  /**
   * Ruby annotation.
   */
  const RUBY = 'ruby';

  /**
   * Ruby explanation.
   */
  const RT = 'rt';

  /**
   * For browsers not supporting ruby annotations.
   */
  const RP = 'rp';

  /**
   * Text that is not correct anymore.
   */
  const S = 's';

  /**
   * Sample output of computer program.
   */
  const SAMP = 'samp';

  /**
   * Define sources for media elements (video and audio).
   */
  const SOURCE = 'source';

  /**
   * Defines tracks for media elements (video and audio).
   */
  const TRACK = 'track';
  const STYLE = 'style';
  const TABLE = 'table';
  const THEAD = 'thead';
  const TBODY = 'tbody';
  const TFOOT = 'tfoot';
  const TH = 'th';
  const TD = 'td';
  const TR = 'tr';
  const TITLE = 'title';

  /**
   * Stylistically different text.
   */
  const U = 'u';

  /**
   * Defines a variable.
   */
  const VARTAG = 'var';
  const VIDEO = 'video';

  /**
   * Possible line-break.
   */
  const WBR = 'wbr';
}
