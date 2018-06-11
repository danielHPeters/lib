<?php

namespace rafisa\lib\generators;

/**
 * Class ImageGenerator.
 *
 * @package rafisa\lib\generators
 * @author Daniel Peters
 * @version 1.0
 */
abstract class ImageGenerator {
	public static function createThumbnail( string $filePath, string $thumbsPath ): bool {
		$image          = imagecreatefromjpeg( $filePath );
		$thumbNail_temp = imagecreatetruecolor( 100, 50 );
		$success        = imagecopy( $thumbNail_temp, $image, 0, 0, 0, 0, 100, 50 );

		if ( $success ) {
			$success = imagejpeg( $thumbNail_temp, $thumbsPath );
		}

		return $success;
	}
}
