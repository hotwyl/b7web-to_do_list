<?php

namespace App\Repository;

use App\Models\User;

class AuthRepository
{
    public function salvarUsuario($usuario)
    {
        try {

            return User::create($usuario);

        } catch (\Exception $th) {
            throw $th;
        }
    }

    public function buscarUsuario($email)
    {
        try {

            return User::where('email', $email)->first();;

        } catch (\Exception $th) {
            throw $th;
        }
    }

}
