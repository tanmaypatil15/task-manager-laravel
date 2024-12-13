<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Todo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Todo::create([            
            'title' => 'First Todo',
            'description' => 'This is the description for the first todo.',
            'completed' => false,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);

        Todo::create([            
            'title' => 'Second Todo',
            'description' => 'This is the description for the first todo.',
            'completed' => false,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);


        Todo::create([            
            'title' => 'Third Todo',
            'description' => 'This is the description for the first todo.',
            'completed' => false,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
    }
}
