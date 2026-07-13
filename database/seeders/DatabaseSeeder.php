<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use App\Models\Attachment;
use App\Models\Delivery;
use App\Models\Wallet;
use App\Models\Information;
use App\Models\Cv;
use App\Models\CvContent;
use App\Models\Comment;
use App\Models\Evaluation;
use App\Models\ContactUs;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // create test user + sample data
        User::firstOrCreate([
            'email' => 'test@example.com'
        ], [
            'name' => 'Test User',
        ]);

        // create additional users with related data
        User::factory(5)->create()->each(function($user){
            if (!$user->information) {
                $user->information()->save(Information::factory()->make());
            }
            if (!$user->wallet) {
                $user->wallet()->save(Wallet::factory()->make());
            }
            if (!$user->cv) {
                $user->cv()->save(Cv::factory()->make());
            }

            $projects = Project::factory(2)->create(['user_id' => $user->id]);
            foreach ($projects as $project) {
                Task::factory(3)->create(['project_id' => $project->id]);
                Attachment::factory(2)->create(['project_id' => $project->id]);
                Comment::factory(2)->create(['commentable_type' => Project::class, 'commentable_id' => $project->id]);
                Evaluation::factory(1)->create(['evaluationable_type' => Project::class, 'evaluationable_id' => $project->id]);
            }

            // some contact messages
            ContactUs::factory(2)->create();
        });
    }
}
