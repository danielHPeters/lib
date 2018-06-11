<?php

namespace rafisa\lib\image;

use rafisa\lib\file\File;

/**
 * Class Image.
 *
 * @package rafisa\lib\image
 * @author Daniel Peters
 * @version 1.0
 */
class Image extends File {
	private $id;
	private $description;

	public function __construct(
		string $id,
		string $name,
		string $description,
		int $size,
		string $fileEnding = 'jpg',
		string $mimeType = 'image/jpeg'
	) {
		$this->id = $id;
		$this->setName( $name );
		$this->description = $description;
		$this->setSize( $size );
		$this->setExtension( $fileEnding );
		$this->setMimeType( $mimeType );
	}

}
