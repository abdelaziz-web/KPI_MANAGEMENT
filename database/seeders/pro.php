<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\processuse;

class proc extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
  // processuse::factory(10)->create();

  processuse::create([
    'designation_processus' => 'alpha1',
    
    // ...
]);


    }
}
