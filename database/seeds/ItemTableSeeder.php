<?php

use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory('App\Item', 50)->create();
        DB::table('items')->delete();
        $json = File::get("database/data/menu.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            DB::table('items')->insert(array(
                'name' => $obj->name,
                'description' => $obj->description,
                'price' => $obj->price
            ));
        }
    }
}
