<?php
namespace App\Repositories;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function allUsers()
    {
        $users = User::select('users.*', 'user_types.name AS user_type_name')
            ->leftJoin('user_types', 'users.user_type_id', '=', 'user_types.id')
            ->latest()->paginate(10);
        return $users;
    }
}