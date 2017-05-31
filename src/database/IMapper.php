<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\database;

use rafisa\lib\src\collections\ICollection;
use rafisa\lib\src\entities\Entity;

/**
 * Interface for orm mapper
 * 
 * @author d.peters
 */
interface IMapper {

    /**
     * @param int $id
     * @return Entity
     */
    public function findById(int $id) : Entity;

    /**
     * @param string $conditions
     * @return Entity
     */
    public function find(string $conditions = '') : ICollection;
    
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
