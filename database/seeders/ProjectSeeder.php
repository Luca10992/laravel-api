<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types = Type::all()->pluck('id');
        
        for ($i=0; $i < 50; $i++) { 
            $project = new Project;
            $project->type_id = $faker->randomElement($types);
            $project->title = $faker->company();
            $project->description = $faker->paragraphs(2, true);
            $project->save();
        }
    }
}