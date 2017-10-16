<?php

namespace rafisa\lib\render;

/**
 * Class PageLoader
 *
 * @author  d.peters
 * @version 1.0
 * @package rafisa\lib\render
 */
class PageLoader
{
    /**
     *
     * @var string
     */
    private $pagesPath;

    /**
     * PageLoader constructor.
     *
     * @param string $pagesPath
     */
    public function __construct(string $pagesPath)
    {
        $this->pagesPath = $pagesPath;
    }

    public function loadHtmlPage(string $page)
    {
        $htmlFile = $this->pagesPath . $page . '.html';

        return file_exists($htmlFile) ? file_get_contents($htmlFile) : 'Page not found!';
    }
}
