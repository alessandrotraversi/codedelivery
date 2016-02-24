<?php

use CodeDelivery\Models\Client;
use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(CreateOauthClientsTable::class)->create([
            'client_id' => 'appid01',
            'client_secret' => 'secret',
            'app' => 'Minha App Mobile',
            'created_at'=> dateTime($max = 'now'),
            'updated_at' => dateTime($max = 'now')
        ]);

    }
}
