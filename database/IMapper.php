<?php

namespace rafisa\lib\database;

use rafisa\lib\collections\ICollection;
use rafisa\lib\entities\Entity;

/**
 * Interface for orm mapper
 *
 * @author  d.peters
 * @version 1.0
 */
interface IMapper
{

    /**
     * @param int $id
     *
     * @return Entity
     */
    public function findById(int $id): Entity;

    /**
     * @param string $conditions
     *
     * @return ICollection
     */
    public function find(string $conditions = ''): ICollection;

    /**
     *
     * @param Entity $entity
     */
    public function insert(Entity $entity);

    /**
     *
     * @param Entity $entity
     */
    public function update(Entity $entity);

    /**
     *
     * @param Entity $entity
     */
    public function delete(Entity $entity);
}