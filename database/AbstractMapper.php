<?php

namespace lib\database;

use lib\collection\Collection;
use lib\collection\ArrayList;
use lib\model\entity\Entity;
use InvalidArgumentException;


/**
 * Class AbstractMapper.
 *
 * @package lib\database
 * @author Daniel Peters
 * @version 1.0
 */
abstract class AbstractMapper implements Mapper {
	private $adapter;
	private $table;
	private $class;

	public function __construct( Adapter $adapter, string $table, Entity $class ) {
		$this->adapter = $adapter;
		$this->table   = $table;
		$this->class   = $class;
	}

	public function getAdapter(): Adapter {
		return $this->adapter;
	}

	public function getTable(): string {
		return $this->table;
	}

	public function getClass(): Entity {
		return $this->class;
	}

	public function setTable( string $table ) {
		if ( empty( trim( $table ) ) ) {
			throw new InvalidArgumentException( 'Table string is empty' );
		} else {
			$this->table = $table;
		}
	}

	public function setClass( Entity $class ) {
		$this->class = $class;
	}

	public function find( string $conditions = '' ): Collection {
		$collection = new ArrayList();
		$this->adapter->select( $this->table, $conditions );

		while ( $data = $this->adapter->fetch() ) {
			$collection->add( $data );
		}

		return $collection;
	}

	public function findById( int $id ): Entity {
		$this->adapter->select( $this->table, 'id = ' . $id );
		$data = $this->adapter->fetch();

		return $data !== null ? $this->createEntity( $data ) : null;
	}

	public function insert( Entity $entity ) {
		if ( ! $entity instanceof $this->class ) {
			throw new InvalidArgumentException( 'The entity must be an instance of ' . $this->class . '.' );
		}

		return $this->adapter->insert( $this->table, $entity->toArray() );
	}

	public function update( Entity $entity ) {
		if ( ! $entity instanceof $this->class ) {
			throw new InvalidArgumentException( 'The entity must be an instance of ' . $this->class . '.' );
		}
		$id   = $entity->getId();
		$data = $entity->toArray();
		unset( $data['id'] );

		return $this->adapter->update( $this->table, $data, 'id = ' . $id );
	}

	public function delete( Entity $entity ) {
		if ( ! $entity instanceof $this->class ) {
			throw new InvalidArgumentException( 'The entity must be an instance of ' . $this->class . '.' );
		}
		$id = $entity->getId();

		return $this->adapter->delete( $this->table, 'id = ' . $id );
	}

	abstract protected function createEntity( array $data ): Entity;
}
