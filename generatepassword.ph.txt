  public static function generatePassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }