<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
                $permissions = [
                        'users',
                        'userList',
                        'usersRoles',
                        'setting',
                        'teachers',
                        'students',
                        'lessons',
                        'calendar',
                        'subscriptions',
                        'section',

                        'add user',
                        'edit user',
                        'delete user',

                        'show role',
                        'add role',
                        'edit role',
                        'delete role',

                        'add product',
                        'edit product',
                        'delete product',

                        'add students',
                        'edit students',
                        'delete students',

                        'add teachers',
                        'edit teachers',
                        'delete teachers',

                        'show lessons',
                        'add lessons',
                        'edit lessons',
                        'delete lessons',

                        'show subscriptions',
                        'add subscriptions',
                        'edit subscriptions',
                        'delete subscriptions',

                ];
                foreach ($permissions as $permission) {
                        Permission::create(['name' => $permission]);
                }
        }
}
