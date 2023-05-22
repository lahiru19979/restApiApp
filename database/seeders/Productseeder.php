<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Productseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'table',
            'description' => 'wood',
            'image' => '/storage/L7DtSnaFYPvvNYll1PbxEYZ6z2ZY9WDy5XIJz1lL.jpg',    
         ]);

         DB::table('products')->insert([
            'name' => 'chair',
            'description' => 'plastic',
            'image' => '/storage/LRoQ97tHhJxtP9GYTjAiMzOgOEmjOzGcsTLftzNP.jpg',    
         ]);

         DB::table('products')->insert([
            'name' => 'mouse',
            'description' => 'plastic',
            'image' => '/storage/Y3Iw5HRK6NrWdbeXaxoMNmMOC8de79D1GlSrIvRS.jpg',    
         ]);

         DB::table('products')->insert([
            'name' => 'computer',
            'description' => 'plastic',
            'image' => '/storage/negIe7fsyNTve7rRsharkcTbmKOSgh0tyxcxDoqN.jpg',    
         ]);

         DB::table('products')->insert([
            'name' => 'phone',
            'description' => 'metal',
            'image' => '/storage/FQZ4ySuNpEUCkCpRWg6uYb2Ait7deBVRPXu830RW.jpg',    
         ]);
    }
}
