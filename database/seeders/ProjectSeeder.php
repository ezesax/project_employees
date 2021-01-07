<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = new Project();

        $project->name = 'Manage My Teams';
        $project->description = 'Projecto de soporte y mantenimiento de aplicacion de recursos humanos';
        $project->save();

        $project = new Project();

        $project->name = 'CIO LAD Europe';
        $project->description = 'Projecto de soporte y mantenimiento de aplicaciones de gestion para cliente en España';
        $project->save();

        $project = new Project();

        $project->name = 'Centriply';
        $project->description = 'Projecto de soporte y mantenimiento de aplicaciones de marketing para cliente en USA';
        $project->save();
    }
}
