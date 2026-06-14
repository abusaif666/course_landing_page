<?php

namespace Database\Seeders;

use App\Models\SmtpSetting;
use Illuminate\Database\Seeder;

class SmtpSeeder extends Seeder
{
    public function run()
    {
        SmtpSetting::create([
            'mail_type' => 'payment',
            'mail_mailer' => 'smtp',
            'mail_host' => 'smtp.gmail.com',
            'mail_port' => '587',
            'mail_username' => 'saif666840@gmail.com',
            'mail_password' => 'yxdjytxliysdsbpl',
            'mail_encryption' => 'tls',
            'mail_from_address' => 'saif666840@gmail.com',
            'mail_from_name' => 'Adminify',
        ]);
    }
}
