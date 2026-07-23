<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use App\Models\Job;
use App\Models\Skill;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create skills
        $skills = ['PHP', 'Laravel', 'React', 'TypeScript', 'JavaScript', 'MySQL', 'Docker', 'Git'];
        foreach ($skills as $skill) {
            Skill::create(['name' => $skill]);
        }

        // Create job seeker
        $jobSeeker = User::create([
            'name' => 'John Doe',
            'email' => 'jobseeker@example.com',
            'password' => Hash::make('password'),
            'role' => 'job_seeker',
            'phone' => '9876543210',
            'bio' => 'Experienced developer',
        ]);

        // Create recruiter
        $recruiter = User::create([
            'name' => 'Jane Smith',
            'email' => 'recruiter@example.com',
            'password' => Hash::make('password'),
            'role' => 'recruiter',
        ]);

        // Create company
        $company = Company::create([
            'user_id' => $recruiter->id,
            'name' => 'Tech Corp',
            'description' => 'Leading tech company',
            'website' => 'https://techcorp.com',
            'location' => 'New York',
            'industry' => 'Technology',
        ]);

        // Create jobs
        $jobTitles = ['Senior Developer', 'Junior Developer', 'UI Designer', 'Product Manager'];
        foreach ($jobTitles as $title) {
            Job::create([
                'company_id' => $company->id,
                'title' => $title,
                'description' => 'Great opportunity to join our team',
                'job_type' => 'Full-time',
                'location' => 'New York',
                'salary_min' => 60000,
                'salary_max' => 120000,
                'experience_level' => 2,
                'open_positions' => 2,
                'published_at' => now(),
            ]);
        }
    }
}