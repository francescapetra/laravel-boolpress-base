<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newUser = new User();
        $newUser->name = "Pippo";
        $newUser->email = "pippo@gmail.com";
        $newUser->password = Hash::make('12345678');
        $newUser->save();
    }
}
