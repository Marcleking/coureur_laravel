<?php 
namespace Coureur\Connexion;

use Illuminate\Auth\GenericUser;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserProviderInterface;

class CoureurAuthProvider implements UserProviderInterface
{
    /**
    * Retrieve a user by their unique identifier.
    *
    * @param  mixed  $id
    * @return \Illuminate\Auth\UserInterface|null
    */
    public function retrieveById($id)
    {

        $user = \DB::select('Call Utilisateur(?)', [$id]);

        if (isset($user))
            return new GenericUser(
                [
                    'id' => $user[0]->courriel,
                    'type' => $user[0]->typeEmploye
                ]
            );
        else
            return null;
    }

    /**
    * Retrieve a user by the given credentials.
    * DO NOT TEST PASSWORD HERE!
    *
    * @param  array  $credentials
    * @return \Illuminate\Auth\UserInterface|null
    */
    public function retrieveByCredentials(array $credentials)
    {
        $user = \DB::select('Call Utilisateur(?)', [$credentials['email']]);

        if (isset($user))
            return new GenericUser(
                [
                    'id' => $user[0]->courriel,
                    'type' => $user[0]->typeEmploye
                ]
            );
        else
            return null;
    }

    /**
    * Validate a user against the given credentials.
    *
    * @param  \Illuminate\Auth\UserInterface  $user
    * @param  array  $credentials
    * @return bool
    */
    public function validateCredentials(UserInterface $user, array $credentials)
    {
        $user = \DB::select('Call Connexion(?, ?, ?, ?)', [$credentials['email'], $credentials['password'], '123', '123']);

        if(isset($user[0]))
            return true;
        else
            return false;
    }
}
?>