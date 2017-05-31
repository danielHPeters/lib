<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\observer;

use rafisa\lib\src\collections\ArrayList;
use rafisa\lib\src\entities\Entity;

/**
 * Description of Observable
 *
 * @author d.peters
 */
abstract class Observable extends Entity {
    
    /**
     *
     * @var container for attached observers 
     */
    private $observers;
    
    /**
     * Constructor
     */
    public function __construct() {
        $this->observers = new ArrayList();
    }
    
    public function getObservers() {
        return $this->observers;
    }

        /**
     * 
     * @param IObserver $obs
     */
    public function attach(IObserver $obs){
        $this->observers->add($obs);
    }
    
    /**
     * 
     * @param IObserver $obs
     */
    public function detach(IObserver $obs){
        $key = $this->observers->indexOf($obs);
        $this->observers->remove($key);
    }
    
    /**
     * Notify observers
     */
    public function notify(){
        
        foreach($this->observers as $obs){
            $obs->update($this);
        }
    }
}
