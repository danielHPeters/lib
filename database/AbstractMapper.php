<?php

namespace rafisa\lib\database;

use rafisa\lib\collections\ICollection;
use rafisa\lib\collections\ArrayList;
use rafisa\lib\entities\Entity;
use InvalidArgumentException;

/**
 * Description of AbstractMapper
 *
 * @author  d.peters
 * @version 1.0
 */
abstract class AbstractMapper implements IMapper
{
    /**
     * Database adapter
     *
     * @var IAdapter
     */
    private $adapter;

    /**
     * Entity table
     *
     * @var string
     */
    private $table;

    /**
     * Entity class
     *
     * @var Entity
     */
    private $class;

    /**
     *
     * @param IAdapter $adapter
     * @param string   $table
     * @param Entity   $class
     */
    public function __construct(IAdapter $adapter, string $table, Entity $class)
    {
        $this->adapter = $adapter;
        $this->table = $table;
        $this->class = $class;
    }

    /**
     *
     * @return IAdapter
     */
    public function getAdapter(): IAdapter
    {
        return $this->adapter;
    }

    /**
     *
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     *
     * @return Entity
     */
    public function getClass(): Entity
    {
        return $this->class;
    }

    /**
     *
     * @param string $table the entity table
     *
     * @throws InvalidArgumentException thrown on empty table string
     */
    public function setTable(string $table)
    {
        if (empty($table)) {
            throw new InvalidArgumentException('Table string is empty');
        } else {
            $this->table = $table;
        }
    }

    /**
     *
     * @param Entity $class
     */
    public function setClass(Entity $class)
    {
        $this->class = $class;
    }

    /**
     *
     * @param string $conditions
     *
     * @return ICollection
     */
    public function find(string $conditions = ''): ICollection
    {
        $collection = new ArrayList();
        $this->adapter->select($this->table, $conditions);

        while ($data = $this->adapter->fetch()) {
            $collection->add($data);
        }

        return $collection;
    }

    /**
     *
     * @param int $id
     *
     * @return Entity
     */
    public function findById(int $id): Entity
    {
        $this->adapter->select($this->table, 'id = ' . $id);
        $data = $this->adapter->fetch();

        return $data !== null ? $this->createEntity($data) : null;
    }

    /**
     *
     * @param Entity $entity
     */
    public function insert(Entity $entity)
    {
        if (!$entity instanceof $this->class) {
            throw new InvalidArgumentException('The entity must be an instance of ' . $this->class . '.');
        }

        return $this->adapter->insert($this->table, $entity->toArray());
    }

    /**
     *
     * @param Entity $entity
     */
    public function update(Entity $entity)
    {
        if (!$entity instanceof $this->class) {
            throw new InvalidArgumentException('The entity must be an instance of ' . $this->class . '.');
        }

        $id = $entity->getId();
        $data = $entity->toArray();
        unset($data['id']);

        return $this->adapter->update($this->table, $data, 'id = ' . $id);
    }

    /**
     *
     * @param Entity $entity
     */
    public function delete(Entity $entity)
    {
        if (!$entity instanceof $this->class) {
            throw new InvalidArgumentException('The entity must be an instance of ' . $this->class . '.');
        }

        $id = $entity->getId();

        return $this->adapter->delete($this->table, 'id = ' . $id);
    }

    abstract protected function createEntity(array $data): Entity;
}
