<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
                $role = Role::create(['name' => 'Admin']);
                $role1 = Role::create(['name' => 'Manager']);
                $role2 = Role::create(['name' => 'Teacher']);
                $role3 = Role::create(['name' => 'Student']);

                $user = User::create([
                        'username' => 'xdenglish',
                        'name' => 'xdenglish',
                        'email' => 'admin@xdenglish.net',
                        'password' => bcrypt('123456'),
                        'roles_name' => ['Admin'],
                        'status' => 'active'
                ]);

                $permissions = Permission::pluck('id', 'id')->all();
                $role->syncPermissions($permissions);
                $user->assignRole([$role->id]);
                // --------------
                $user1 = User::create([
                        'username' => 'moazcode',
                        'name' => 'Moaz Alawaity ',
                        'email' => 'moaz2088@gmail.com',
                        'password' => bcrypt('moaz2088@gmail.com'),
                        'roles_name' => ['Admin'],
                        'status' => 'active'
                ]);
                $permissions1 = Permission::pluck('id', 'id')->all();
                $role->syncPermissions($permissions1);
                $user1->assignRole([$role->id]);


                $s2 = User::create([
                        'username' => 'std',
                        'name' => 'Student',
                        'email' => 'student@xdenglish.net',
                        'password' => bcrypt('123456'),
                        'roles_name' => ['Student'],
                        'status' => 'active'
                ]);
                $s2->assignRole([$role3->id]);

                $s3 = User::create([
                        'username' => 'teach1',
                        'name' => 'Teacher',
                        'email' => 'teacher@xdenglish.net',
                        'password' => bcrypt('123456'),
                        'roles_name' => ['Teacher'],
                        'status' => 'active'
                ]);
                $s3->assignRole([$role2->id]);
        }
}
