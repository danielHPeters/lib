<?php

namespace rafisa\lib\auth;

/**
 * Description of SessionManager
 *
 * @author d.peters
 */
class SessionManager
{
    public static function startSession(string $name, int $limit = 0, $path = '/', $domain = null, $secure = null)
    {

        session_name($name . 'Session');

        $domain = isset($domain) ? $domain : isset($_SERVER['SERVER_NAME']);

        $https = isset($secure) ? $secure : isset($_SERVER['HTTPS']);

        session_set_cookie_params($limit, $path, $domain, $secure, true);
        session_start();

        if (!self::hijackAttempted()) {
            $_SESSION = [];
            $_SESSION['IPaddress'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
        }
    }

    public static function hijackAttempted()
    {

        $hijackedAttempted = true;

        if (!isset($_SESSION['IPaddress']) || !isset($_SESSION['userAgent'])) {
            $hijackedAttempted = false;
        }

        if ($_SESSION['IPaddress'] != $_SERVER['REMOTE_ADDR']) {
            $hijackedAttempted = false;
        }

        if ($_SESSION['userAgent'] != $_SERVER['HTTP_USER_AGENT']) {
            $hijackedAttempted = false;
        }

        return $hijackedAttempted;
    }

    public static function regenerateSession()
    {

        if (!isset($_SESSION['OBSOLETE']) || $_SESSION['OBSOLETE'] === false) {
            $_SESSION['OBSOLETE'] = true;
            $_SESSION['EXPIRES'] = time() + 10;

            session_regenerate_id(false);

            $newSession = session_id();
            session_write_close();
        }
    }
}
