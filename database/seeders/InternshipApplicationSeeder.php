<?php

namespace Database\Seeders;

use App\Models\Internship;
use App\Models\University;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InternshipApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('internship_applications')->truncate();

        // Get all the universities
        // Let each university to apply to 0 or more internships

        $universities = University::all();
        $internships = Internship::with('company')->get();
        // dd($internships->first()->toArray());

        $universities->each(function($university) use ($internships) {
            $internships_to_apply_to = $internships->random(mt_rand(0, 12));
            $internships_to_apply_to->each(function($internship_to_apply_to) use($university) {
                $university->internshipApplications()->attach($internship_to_apply_to->id, ['company_id' => $internship_to_apply_to->company_id]);
            });
        });
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
