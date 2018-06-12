<?php

namespace rafisa\lib\database;

use rafisa\lib\collection\Collection;
use rafisa\lib\model\entity\Entity;

/**
 * Interface Mapper.
 *
 * @package rafisa\lib\database
 * @author Daniel Peters
 * @version 1.0
 */
interface Mapper {
	public function findById( int $id );

	public function find( string $conditions = '' ): Collection;

	public function insert( Entity $entity );

	public function update( Entity $entity );

	public function delete( Entity $entity );
}
