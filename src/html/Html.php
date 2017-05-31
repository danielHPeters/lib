<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\html;

use rafisa\lib\src\collections\ArrayList;
use rafisa\lib\src\datastructures\IDomNode;
use rafisa\lib\src\entities\Entity;

/**
 * Description of Html
 *
 * @author d.peters
 */
class Html extends Entity implements IDomNode
{

    /**
     * Name of the tag. e.g. div, body, h1
     * @var string
     */
    private $name;

    /**
     *
     * @var string
     */
    private $text;

    /**
     *
     * @var type
     */
    private $classes;

    /**
     *
     * @var attributes of the html tag
     */
    private $attributes;

    /**
     *
     * @var ArrayList
     */
    private $children;

    /**
     *
     * @param string $name
     * @param string $text
     */
    public function __construct(string $name, string $text, string $id = '')
    {
        $this->setId($id);
        $this->name = $name;
        $this->text = $text;
        $this->classes = new ArrayList();
        $this->attributes = new ArrayList();
        $this->children = new ArrayList();
    }

    /**
     * @return string
     */
    public function getHtml() : string
    {

        $content = '';

        if ($this->children->isEmpty()) {
            $content = $this->text;
        } else {
            $this->children->each(function ($element) use (&$content) {
                $content .= $element->getHtml();
            });
        }
        return '<' . $this->name . '' .
        (($this->getId() !== '') ? ' id="' . $this->getId() . '" ' : '') .
        ((!$this->classes->isEmpty()) ? 'class="' . implode(' ', $this->classes->toArray()) . '"' : '') . '>' .
        $content .
        '</' . $this->name . '>';
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getText() : string
    {
        return $this->text;
    }

    /**
     * @return ArrayList
     */
    public function getClasses() : ArrayList
    {
        return $this->classes;
    }

    /**
     * @return ArrayList
     */
    public function getAttributes() : ArrayList
    {
        return $this->attributes;
    }

    /**
     * @return ArrayList
     */
    public function getChildren(): ArrayList
    {
        return $this->children;
    }

    /**
     * @param string $tagName
     */
    public function setName(string $tagName)
    {
        $this->name = $tagName;
    }

    /**
     * Replace content with the passed string
     * @param string $text
     */
    public function setText(string $text)
    {
        $this->text = $text;
    }

    /**
     * Append a string to the content of this tag
     * @param string $text
     */
    public function appendText(string $text)
    {
        $this->text .= $text;
    }

}
