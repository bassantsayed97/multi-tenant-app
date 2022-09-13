<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('tenants')->truncate();
        Schema::enableForeignKeyConstraints();

        $tenant  = Tenant::create([
            'name' =>"isupply",
            'domain'=>'isupply.isupply.com',
            'is_active'   => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $tenant  = Tenant::create([
            'name' =>"test",
            'domain'=>'test.isupply.com',
            'is_active'   => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $tenant  = Tenant::create([
            'name' =>"dev",
            'domain'=>'dev.isupply.com',
            'is_active'   => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);




    }
}
