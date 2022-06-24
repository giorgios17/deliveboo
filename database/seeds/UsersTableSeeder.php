<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = config("users");
        foreach ($users as $user) {
            $newUser = new User();
            $newUser->business_name = $user['business_name'];
            $newUser->email = $user['email'];
            $newUser->password = Hash::make($user['password']);
            $newUser->address = $user['address'];
            $newUser->vat_number = $user['vat_number'];
            $newUser->description = $user['description'];
            $newUser->image = $user['image'];
            $newUser->phone = $user['phone'];
            $newUser->opening_time = $user['opening_time'];
            $newUser->closing_time = $user['closing_time'];
            $newUser->closing_day = $user['closing_day'];
            $newUser->free_shipping = $user['free_shipping'];
            $newUser->shipping_price = $user['shipping_price'];
            $newUser->slug = User::generateSlug($user['business_name']);
            $newUser->save();
        }
    }
}
