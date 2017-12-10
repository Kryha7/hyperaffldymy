<?php

use Illuminate\Database\Seeder;
use App\Roles;
use App\User;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Roles::where('name', 'Admin')->first();
        $moderator = Roles::where('name', 'Moderator')->first();
        $guest = Roles::where('name', 'User')->first();

        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@example.com';
        $user->tickets = 0;
        $user->password = bcrypt('1');
        $user->save();
        $user->roles()->attach($admin);

        $user = new User();
        $user->name = 'moderator';
        $user->email = 'moderator@example.com';
        $user->tickets = 0;
        $user->password = bcrypt('1');
        $user->save();
        $user->roles()->attach($moderator);

        $user = new User();
        $user->name = 'user';
        $user->email = 'user@example.com';
        $user->tickets = 0;
        $user->password = bcrypt('1');
        $user->save();
        $user->roles()->attach($guest);
    }
}
