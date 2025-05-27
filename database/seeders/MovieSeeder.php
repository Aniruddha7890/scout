<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        // Run raw SQL from a file
        DB::unprepared(file_get_contents(database_path('sql/mydata.txt')));
    }
}
