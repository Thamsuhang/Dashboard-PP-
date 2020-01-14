<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PrivilegeSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('privileges')->insert([
           'privilege_name'=>'Super Admin',
            'status'=>1,
            'created_at'=>\Illuminate\Support\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Illuminate\Support\Carbon::now()->toDateTimeString()

        ]);
    }
}
