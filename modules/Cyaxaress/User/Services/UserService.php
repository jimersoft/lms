<?php


namespace Cyaxaress\User\Services;


class UserService
{
    public static function ChangePassword($user,$newPassword)
    {
      $user->password=bcrypt($newPassword);
      $user->save();
    }
}
