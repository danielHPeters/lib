<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\blog;

use rafisa\lib\src\collections\ICollection;
use rafisa\lib\src\collections\ArrayList;

/**
 * Description of Blog
 *
 * @author Daniel
 */
class Blog {
    
    /**
     *
     * @var ICollection 
     */
    private $posts;
    
    /**
     *
     * @var ICollection 
     */
    private $users;
    
    /**
     * 
     */
    public function __construct() {
        $this->posts = new ArrayList();
        $this->users = new ArrayList();
    }
    
    /**
     * 
     * @return ICollection
     */
    public function getPosts(): ICollection {
        return $this->posts;
    }

    /**
     * 
     * @return ICollection
     */
    public function getUsers(): ICollection {
        return $this->users;
    }


}
