<?php

class Securite {
    public static function secureHTML($string){
        return htmlentities($string);
    }

    public static function genereCookiePassword(){
        $ticket = session_id().microtime().rand(0,9999999);
        $ticket = hash("sha256", $ticket);
        setcookie("timer", $ticket, time() + (60 * 20));
        $_SESSION["timer"] = $ticket;
    }

    public static function verificationCookie(){;
        if(isset($_SESSION["timer"]) && $_COOKIE["timer"] === $_SESSION["timer"]){
            Securite::genereCookiePassword();
            return true;
        } else {
            session_destroy();
            throw new Exception("Vous n'avez pas le droit d'être là !");
        }
    }

    public static function verifAccessSession(){
        return (isset($_SESSION['acces']) && !empty($_SESSION['acces']) && $_SESSION['acces'] === "admin");
    }

    public static function verificationAccess(){
        return (self::verifAccessSession() && self::verificationCookie());
    }
}