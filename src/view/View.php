<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\view;

/**
 * Description of View
 *
 * @author d.peters
 */
class View {
    
    /**
     *
     * @var string 
     */
    private $path;
    
    /**
     *
     * @var stromg 
     */
    private $template;
    
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
     * 
     * @param string $template
     */
    public function __construct(string $template = 'default') {
        $this->template = $template;
    }
    
    /**
     * 
     * @param string $key
     * @param string $value
     */
    public function assignVar(string $key, string $value){
        $this->vars[$key] = $value;
    }
    
    /**
     * 
     * @throws Exception
     */
    public function loadTemplate(){
        $file = $this->path . '/' . $this->template . '.php';
        
        if(file_exists($file)){
            ob_start();
            include $file;
            $this->html = ob_get_contents();
            ob_end_clean();
        } else {
            throw new Exception('Template not found.');
        }
    }
    
}
