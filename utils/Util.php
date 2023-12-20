
<?php
class Util
{

    public static function encodeString(string $string)
    {
        //encodage string

        $encodedString = hash('sha256', $string);

        return $encodedString;
    }

    public static function generateToken($length = 32)
    {
        // Générer une chaîne aléatoire pour le token
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = '';
        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $token;
    
    }
}
?>