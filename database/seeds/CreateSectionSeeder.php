<?php

use Illuminate\Database\Seeder;
use App\Section as Sections;


class CreateSectionSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {

                $section = Sections::create([
                        'section_name' => '15분 수강료',
                        'Created_by' => 'admin'
                ]);
                $section2 = Sections::create([
                        'section_name' => '25분 수강료',
                        'Created_by' => 'admin'

                ]);
                $section3 = Sections::create([
                        'section_name' => '50분 수강료',
                        'Created_by' => 'admin'

                ]);
        }
}
