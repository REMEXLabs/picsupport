<?php

use Illuminate\Database\Seeder;
use App\Pikto;

class PiktoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pikto::create(array(
            'name' => 'urn:uuid:d374807f-6396-11e5-87f3-00075c51ac83',
            'user_id' => 1
        ));
    }
}
