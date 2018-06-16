<?php

namespace Core\Auth;

class Auth
{
    const TOKEN_FORCE = 32;

    public function __construct()
    {
        try {
            $this->token = random_bytes(self::TOKEN_FORCE);
        } catch (\Exception $e) {
            print $e->getTraceAsString();
        } catch (\TypeError $e) {
            print $e->getTraceAsString();
        } catch (\Error $e) {
            print $e->getTraceAsString();
        }
    }

    public static function renewCsrfToken()
    {
        $_SESSION['csrfToken'] = bin2hex(openssl_random_pseudo_bytes(self::TOKEN_FORCE));
        return $_SESSION['csrfToken'];
    }

    public static function getCsrfToken()
    {
        if (empty($_SESSION['csrfToken'])) {
            return self::renewCsrfToken();
        }
        return $_SESSION['csrfToken'];
    }

    public static function validateCsrfToken($token)
    {
        return $_SESSION['csrfToken'] === $token;
    }
}
