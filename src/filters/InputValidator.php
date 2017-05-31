<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\filters;

/**
 * Description of InputValidator
 *
 * @author d.peters
 */
abstract class InputValidator {

    const VALID_EMAIL = "^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$";

    /**
     * 
     * @param string $email
     * @return bool
     */
    public static function validEmail(string $email): bool {
        return preg_match(self::VALID_EMAIL, $email);
    }

    /**
     * 
     * @param array $fields
     * @return array
     */
    public static function checkPostVars(array $fields): array {
        $msg = [];

        foreach ($fields as $key => $value) {

            if (!isset($_POST[$key]) || empty(trim($_POST[$key]))) {

                $msg['errors'][] = $value;
            }
        }

        return $msg;
    }

}
