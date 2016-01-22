<?php

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $user = new User();
        $user->full_name = 'norhan elnezamy';
        $user->email = 'norhanelnezamy@gmail.com';
        $user->password = Hash::make('nour');
        $user->telephone = '01222222222';
        $user->admin = 1;
        $user->save();
    }
}