<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\personas;
use Faker\Factory as Faker;
 class personasSeeder extends Seeder {
 	public function run()
	{
		$faker=Faker::create();
		for ($i =0; $i <3; $i++)
		{
			personas::create
			([
				'nombre'=>$faker->word(),
				'apellido'=>$faker->word(),
				'rut'=>$faker->randomNumber(9),
				'fecha'=>$faker->date('Y,m,d')
			]);
		}
		}
	} 