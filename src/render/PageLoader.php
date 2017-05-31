<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\render;

/**
 * Class PageLoader
 * @package rafisa\lib\src\render
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