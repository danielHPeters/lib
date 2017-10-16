<?php

namespace rafisa\lib\observer;

use rafisa\lib\collections\ArrayList;
use rafisa\lib\collections\ICollection;
use rafisa\lib\entities\Entity;

/**
 * Description of Observable
 *
 * @author d.peters
 */
abstract class Observable extends Entity
{
    /**
     *
     * @var ICollection container for attached observers
     */
    private $observers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->observers = new ArrayList();
    }

    public function getObservers(): ICollection
    {
        return $this->observers;
    }

    /**
     *
     * @param IObserver $obs
     */
    public function attach(IObserver $obs)
    {
        $this->observers->add($obs);
    }

    /**
     *
     * @param IObserver $obs
     */
    public function detach(IObserver $obs)
    {
        $key = $this->observers->indexOf($obs);
        $this->observers->remove($key);
    }

    /**
     * Notify observers
     */
    public function notify()
    {
        $this->observers->each(
            function (IObserver $obs) {
                $obs->update($this);
            }
        );
    }
}
