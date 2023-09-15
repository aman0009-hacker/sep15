<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\DB;


class CustomUserProvider implements UserProvider
{
    public function retrieveById($identifier)
    {}

    public function retrieveByToken($identifier, $token)
    {}

    public function updateRememberToken(Authenticatable $user, $token)
    {}

    public function retrieveByCredentials(array $credentials)
    {
        // Use $credentials to get the user data, and then return an object implements interface `Illuminate\Contracts\Auth\Authenticatable` 
        if (!empty($credentials['email'])) {
            // Query the 'users' table to retrieve a user by username
            $user = DB::table('admin_users')->where('username', $credentials['username'])->first();

            if ($user) {
                // Create a user object implementing Authenticatable interface
                return new CustomUserProvider($user->id, $user->username, $user->password);
            }
        }


        return null; // Return null if user not found
    
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        // Verify the user with the username password in $ credentials, return `true` or `false`
    }
}