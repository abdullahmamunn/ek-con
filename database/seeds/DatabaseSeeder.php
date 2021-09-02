<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        //Creating a demo user
        $exist_demo_user = User::where('email', 'admin@example.com')->first();
        if($exist_demo_user){
	        
        }else{
        	DB::table('users')->insert([
	        	'name'		=> 'Administrtor',
	        	'email'		=> 'admin@gmail.com',
	        	'password'	=> bcrypt('admin123')
	        ]);

            DB::table('site_settings')->insert([
                'site_title'        => 'Laravel'                
            ]);          	
        }

    }
}
