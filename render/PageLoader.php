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
    private $pathToHtml;

    /**
     * PageLoader constructor.
     *
     * @param string $pathToHtml
     */
    public function __construct(string $pathToHtml)
    {
        $this->pathToHtml = $pathToHtml;
    }

    public function loadHtmlPage(string $page)
    {
        $htmlFile = $this->pathToHtml . $page . '.html';

        return file_exists($htmlFile) ? file_get_contents($htmlFile) : 'Page not found!';
    }
}
