<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('employee')->insert([
            [
                'name' => 'hehe',
                'email' => 'anhnguyen123@gmail.com',
                'password' => '123456',
                'role' => '0',
                'manager_id' => '2',
            ],
            [
                'name' => 'quanlyne',
                'email' => 'anhnguyen12356@gmail.com',
                'password' => '123456',
                'role' => '1',
                'manager_id' => null,
            ],
            [
                'name' => 'David Brown',
                'email' => 'david.brown@gmail.com',
                'password' => '123456',
                'role' => '1',
                'manager_id' => '4',
            ],
            [
                'name' => 'Linda Davis',
                'email' => 'linda.davis@gmail.com',
                'password' => '123456',
                'role' => '1',
                'manager_id' => '4',
            ],
            [
                'name' => 'Robert Wilson',
                'email' => 'robert.wilson@gmail.com',
                'password' => '123456',
                'role' => '1',
                'manager_id' => '2',
            ],
            [
                'name' => 'Emily Taylor',
                'email' => 'emily.taylor@gmail.com',
                'password' => '123456',
                'role' => '0',
                'manager_id' => '2',
            ],
            [
                'name' => 'William White',
                'email' => 'william.white@gmail.com',
                'password' => '123456',
                'role' => '0',
                'manager_id' => '2',
            ],
            [
                'name' => 'Daniel Martinez',
                'email' => 'daniel.martinez@gmail.com',
                'password' => '123456',
                'role' => '0',
                'manager_id' => '2',
            ],
            [
                'name' => 'Sophia Moore',
                'email' => 'sophia.moore@gmail.com',
                'password' => '123456',
                'role' => '0',
                'manager_id' => '2',
            ],
            [
                'name' => 'Matthew Taylor',
                'email' => 'matthew.taylor@gmail.com',
                'password' => '123456',
                'role' => '0',
                'manager_id' => '2',
            ],
            [
                'name' => 'Ava Johnson',
                'email' => 'ava.johnson@gmail.com',
                'password' => '123456',
                'role' => '0',
                'manager_id' => '2',
            ],
            [
                'name' => 'Oliver Harris',
                'email' => 'oliver.harris@gmail.com',
                'password' => '123456',
                'role' => '0',
                'manager_id' => '2',
            ],
            [
                'name' => 'Mia Davis',
                'email' => 'mia.davis@gmail.com',
                'password' => '123456',
                'role' => '0',
                'manager_id' => '2',
            ],
            [
                'name' => 'Ethan Jackson',
                'email' => 'ethan.jackson@gmail.com',
                'password' => '123456',
                'role' => '0',
                'manager_id' => '2',
            ],
            [
                'name' => 'Isabella Wilson',
                'email' => 'isabella.wilson@gmail.com',
                'password' => '123456',
                'role' => '0',
                'manager_id' => '2',
            ],
            [
                'name' => 'James Anderson',
                'email' => 'james.anderson@gmail.com',
                'password' => '123456',
                'role' => '0',
                'manager_id' => '2',
            ],
        ]);

        DB::table('request_form')->insert([
            [
                'sender_id' => 1,
                'manager_id' => 2,
                'start_date' => '2023-11-02 00:00:00',
                'end_date' => '2023-11-04 00:00:00',
                'status' => 'pending',
                'reason' => 'Co viec gif do',
                'created_at' => now(),
            ],
            [
                'sender_id' =>3,
                'manager_id' => 2,
                'start_date' => '2023-11-02 00:00:00',
                'end_date' => '2023-11-04 00:00:00',
                'status' => 'pending',
                'reason' => 'Khung',
                'created_at' => now(),
            ],
            [
                'sender_id' => 4,
                'manager_id' => 2,
                'start_date' => '2023-11-02 00:00:00',
                'end_date' => '2023-11-04 00:00:00',
                'status' => 'pending',
                'reason' => 'Co viec gif do',
                'created_at' => now(),
            ],
        ]);
    }
}
