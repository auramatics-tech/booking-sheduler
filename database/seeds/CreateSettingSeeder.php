<?php

use Illuminate\Database\Seeder;
use App\Setting;


class CreateSettingSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {

                $Setting = Setting::create([
                        'name_app' => 'XDEnglish',
                        'logo_app' => 'logo.png',
                        'email' => 'admin@xdenglish.net',
                        'phone' => '0502-1944-0595',
                        'skype_id' => '#',
                        'kako_link' => '#',
                        'chat_link' => '#',
                        'address' => '서울특별시 동대문구 한천로 82, 3층 301호',
                        'operating_hours' => '9AM - 11:30PM',
                ]);
        }
}
