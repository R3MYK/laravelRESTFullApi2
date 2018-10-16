<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;


 class UserSeeder extends Seeder {
 	public function run()
	{
		
			User::create
			([
				'email'=>'correo@correo.cl',
				'password'=>Hash::make('1234')
				
			]);
	
		}
	} 