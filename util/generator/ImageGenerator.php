<?php

namespace rafisa\lib\generator;

/**
 * Class ImageGenerator.
 *
 * @package rafisa\lib\generator
 * @author Daniel Peters
 * @version 1.0
 */
abstract class ImageGenerator {
	public static function createThumbnail( string $filePath, string $thumbsPath ): bool {
		$image          = imagecreatefromjpeg( $filePath );
		$thumbnailTemp = imagecreatetruecolor( 100, 50 );
		$success        = imagecopy( $thumbnailTemp, $image, 0, 0, 0, 0, 100, 50 );

		if ( $success ) {
			$success = imagejpeg( $thumbnailTemp, $thumbsPath );
		}

		return $success;
	}
}
