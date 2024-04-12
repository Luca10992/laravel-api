<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $labels = ["HTML", "CSS", "SQL", "JavaScript", "PHP", "GIT", "Blade", 'Bootstrap', 'VueJS'];

        foreach($labels as $label) {
            $technology = new Technology();
            $technology->label = $label;
            $technology->save();
        }
    }
}