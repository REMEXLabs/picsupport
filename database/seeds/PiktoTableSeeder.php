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
            'name' => 'urn:uuid:de7af777-67aa-11e5-9683-00075c51ac83',
            'title' => 'APITest',
            'user_id' => 1
        ));

        Pikto::create(array(
            'name' => 'urn:uuid:498a697e-6878-11e5-9683-00075c51ac83',
            'title' => 'Pixel',
            'user_id' => 1
        ));
    }
}
