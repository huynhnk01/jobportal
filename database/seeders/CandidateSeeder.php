<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Candidate;
use App\Models\User;

class CandidateSeeder extends Seeder
{
    public function run(): void
    {
        // Tìm user có role là 'candidate'
        $user = User::where('email', 'huynh.kim@gmail.com')->first();

        // Tạo hồ sơ Candidate tương ứng
        if ($user) {
            Candidate::create([
                'user_id'         => $user->id,
                'title'           => 'Kỹ sư phần mềm',
                'date_of_birth'   => '1995-06-15',
                'gender'          => 'male',
                'address'         => '123 Nguyễn Trãi, TP.HCM',
                'phone'           => '0987858523',
                'experience_level'=> 'senior',
                'desired_salary'  => '30m-50m',
                'skills'          => 'PHP, Laravel, MySQL, Docker, Redis',
                'education_level' => 'bachelor',
                'bio'             => 'Tôi là một kỹ sư phần mềm có hơn 5 năm kinh nghiệm trong phát triển ứng dụng web.',
            ]);
        }
    }
}
