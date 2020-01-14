<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data['name']= 'admin';
        $data['username']= 'admin';
        $data['image']= public_path('lib/uploads/admin/admin.jpg');
        $data['email']= 'admin@admin.com';
        $data['status']= '0';

        $data['password']= bcrypt('admin123');
        \App\Models\Admin::create($data);

        DB::table('manage_privileges')->insert([
           'admin_id'=>1,
            'privilege_id'=>1,
            'created_at'=>\Illuminate\Support\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Illuminate\Support\Carbon::now()->toDateTimeString()

        ]);
    }
}
