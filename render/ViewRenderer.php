<?php

namespace rafisa\lib\render;

/**
 * Class ViewRenderer.
 *
 * @package rafisa\lib\render
 * @author Daniel Peters
 * @version 1.0
 */
abstract class ViewRenderer {
	public static function renderTemplate( string $resource, string $location = '', $vars = null ) {
		$html = file_get_contents( $location . '/templates/' . $resource . '.tpl.php' );

		if ( $vars !== null ) {
			foreach ( $vars as $key => $value ) {
				$html = str_replace( '$' . $key, $value, $html );
			}
		}
		echo $html;
	}
}
