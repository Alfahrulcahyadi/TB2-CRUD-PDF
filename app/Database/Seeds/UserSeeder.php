<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user_object = new UserModel();

        $user_object->insertBatch([
            [
                "email" => "qiter@mailinator.com",
                "code_member" => "SA00001",
                "username" => "qiter",
                "password" => password_hash("12341234", PASSWORD_DEFAULT),
                "telephone" => "082155511121",
                "address" => "Jakarta 1",
                "role" => "super_admin",
            ],
            [
                "email" => "soro@mailinator.com",
                "code_member" => "A00001",
                "username" => "soro",
                "password" => password_hash("12341234", PASSWORD_DEFAULT),
                "telephone" => "082155511122",
                "address" => "Jakarta 2",
                "role" => "admin",
            ],
            [
                "email" => "megecile@mailinator.com",
                "code_member" => "M00001",
                "username" => "megecile",
                "password" => password_hash("12341234", PASSWORD_DEFAULT),
                "telephone" => "082155511123",
                "address" => "Jakarta 3",
                "role" => "user",
            ],
        ]);
    }
}
