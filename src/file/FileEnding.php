<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\file;

/**
 * Description of FileEndings
 *
 * @author d.peters
 */
abstract class FileEnding
{

    /**
     * PHP source file
     */
    const PHP = 'php';
    const JAVA = 'java';
    const JAR = 'jar';

    /**
     * JavaFX xml file for GUI
     */
    const FXML = 'fxml';

    /**
     * Javascript source file
     */
    const JAVASCRIPT = 'js';
    const JSON = 'json';
    const XML = 'xml';
    const HTML = 'html';
    const CSS = 'css';
    const C_SOURCE = 'c';

    /**
     * C header file
     */
    const C_HEADER = 'h';
    const CPP_SOURCE = 'cpp';
    const CPP_HEADER = 'hpp';

    /**
     * File extension for pug.js view templates
     */
    const PUG = 'pug';
    const EJS = 'ejs';
    const ODT = 'odt';
    const ODS = 'ods';
    const ODP = 'odp';
    const ODG = 'odg';
    const DOCX = 'docx';
    const PPTX = 'pptx';
    const ZIP = 'zip';
    const PNG = 'png';
    const JPG = 'jpg';
    const JPEG = 'jpeg';
    const PDF = 'pdf';
    const seven_zip = '7zip';
    const RAR = 'rar';

}
