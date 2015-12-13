<?php

use CodeDelivery\Models\User;
use CodeDelivery\Models\Client;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(User::class)->create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);
        
        factory(User::class)->create([
            'name' => 'admin',
            'email' => 'admin@user.com',
            'password' => bcrypt(123456),
            'role'=>'admin',
            'remember_token' => str_random(10),
        ]);
        
        factory(User::class, 10)->create()->each(function($u){
            $u->client()->save(factory(Client::class)->make());
        });
    }
}
