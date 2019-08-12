<?php

use Illuminate\Database\Seeder;
use Laratube\Subscription;
use Laratube\User;
use Laratube\Channel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user1 = factory(User::class)->create([
            'email' => 'jamessingizi@gmail.com'
        ]);

        $user2 = factory(User::class)->create([
            'email' => 'johndoe@gmail.com'
        ]);

        $channel1 = factory(Channel::class)->create([
            'user_id' => $user1->id
        ]);

        $channel2 = factory(Channel::class)->create([
            'user_id' => $user2->id
        ]);

        $channel1->subscriptions()->create([
            'user_id' => $user2->id
        ]);

        $channel1->subscriptions()->create([
            'user_id' => $user1->id
        ]);

        factory(Subscription::class,10000)->create([
            'channel_id' => $channel1->id

        ]);

        factory(Subscription::class,10000)->create([
            'channel_id' => $channel2->id

        ]);
    }

}
