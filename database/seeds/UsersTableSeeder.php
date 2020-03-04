<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = App\User::create([
        	'name'=>'Philip Afemikhe',
        	'email'=>'phillip.afemikhe@ikooba.com',
        	'password'=>bcrypt('@Phillip'),
        	'admin'=>1
        ]);


        App\Profile::create([
        	'user_id'=>$user->id,
        	'avatar'=>'uploads\avater\koala.jpg',
        	'about'=>'some description text  about the user',
        	'facebook'=>'facebook.com',
        	'youtube'=>'youtube.com'
        ]);
    }
}
