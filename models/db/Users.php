<?php


namespace models\db;

class Users
{

    private static $users = [
        '1' => [
            'username' => '21232f297a57a5a743894a0e4a801fc3',
            'password' => '202cb962ac59075b964b07152d234b70',
           ],
    ];


    /**
     * @param $username
     * @param $password
     * @return bool
     */
    public static function validate($username, $password): bool
    {
        foreach (self::$users as $user) {
            if ($user['username'] === md5($username)) {
                return $user['password'] === md5($password);
            }
        }
        return false;
    }

    /**
     * @return bool
     */
    public static function isAdmin(): bool
    {
        return $_SESSION['auth'];
    }

}