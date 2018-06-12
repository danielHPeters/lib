<?php

namespace rafisa\lib\view;

use Exception;

/**
 * Class View.
 *
 * @package rafisa\lib\view
 * @author Daniel Peters
 * @version 1.0
 */
class View {
	private $templatesPath;
	private $file;
	private $vars;
	private $html;

	public function __construct( string $pathToTemplates, string $file ) {
		$this->templatesPath = $pathToTemplates;
		$this->file          = $file;
		$this->vars          = [];
	}

	/**
	 *
	 * @throws Exception
	 */
	private function load() {
		$file = $this->templatesPath . '/' . $this->file . '.tpl';

		if ( file_exists( $file ) ) {
			$content = file_get_contents( $file );

			foreach ( $this->vars as $key => $value ) {
				$toReplace = '{' . $key . '}';
				$content   = str_replace( $toReplace, $value, $content );
			}

			$this->html = $content;
		} else {
			throw new Exception( 'Template not found.' );
		}
	}

	public function setVar( string $key, string $value ) {
		$this->vars[ $key ] = $value;
	}

	/**
	 * @return string
	 * @throws Exception
	 */
	public function getHtml(): string {
		$this->load();

		return $this->html;
	}
}
