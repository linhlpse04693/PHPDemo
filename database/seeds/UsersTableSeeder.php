<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $buyerRole=Role::where('name','buyer')->first();
        $sellerRole=Role::where('name','seller')->first();

        $seller = User::create([
            'name' => 'seller',
            'email' => 'seller@seller.com',
            'password' => bcrypt('seller')
        ]);

        $buyer = User::create([
            'name' => 'buyer',
            'email' => 'buyer@buyer.com',
            'password' => bcrypt('buyer')
        ]);

        $seller -> roles()->attach($sellerRole);
        $buyer -> roles()->attach($buyerRole);
    }
}
