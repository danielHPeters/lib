<?php

namespace lib\file;

/**
 * Class FileReader.
 *
 * @package lib\file
 * @author Daniel Peters
 * @version 1.0
 */
class FileReader {
	private $file;
	private $handle;

	public function __construct( string $file ) {
		$this->file = $file;
	}

	public function open( string $mode ) {
		$this->handle = fopen( $this->file, $mode );
	}

	public function writeLn( string $data ) {
		fwrite( $this->handle, "$data\n" );
	}

	public function close() {
		fclose( $this->handle );
	}
}
