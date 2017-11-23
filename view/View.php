<?php

namespace rafisa\lib\view;

use Exception;

/**
 * Description of View
 *
 * @author  d.peters
 * @version 1.0
 */
class View
{
    /**
     *
     * @var string
     */
    private $pathToTemplates;

    /**
     *
     * @var string
     */
    private $file;

    /**
     *
     * @var array
     */
    private $vars;

    /**
     *
     * @var string
     */
    private $html;

    /**
     * View constructor.
     *
     * @param string $pathToTemplates
     * @param string $file
     */
    public function __construct(string $pathToTemplates, string $file = 'page')
    {
        $this->pathToTemplates = $pathToTemplates;
        $this->file = $file;
        $this->vars = [];
    }

    /**
     *
     * @throws Exception
     */
    public function load()
    {
        $file = $this->pathToTemplates . '/' . $this->file . '.tpl';

        if (file_exists($file)) {
            $content = file_get_contents($file);

            foreach ($this->vars as $key => $value) {
                $toReplace = '{' . $key . '}';
                $content = str_replace($toReplace, $value, $content);
            }

            $this->html = $content;
        } else {
            throw new Exception('Template not found.');
        }
    }

    /**
     *
     * @param string $key
     * @param string $value
     */
    public function setVar(string $key, string $value)
    {
        $this->vars[$key] = $value;
    }

    /**
     * @return string
     */
    public function getHtml(): string
    {
        return $this->html;
    }
}
