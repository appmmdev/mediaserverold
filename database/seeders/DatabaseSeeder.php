<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\V1\AppDetail;
use App\Models\V1\AudioBook;
use App\Models\V1\Comment;
use App\Models\V1\IOSAppDetail;
use App\Models\V1\Like;
use App\Models\V1\Music;
use App\Models\V1\Post;
use App\Models\V1\ProfileImages;
use App\Models\V1\User;
use App\Models\V2\TPost;
use App\Models\V2\TMusic;
use App\Models\V2\TAppDetail;
use App\Models\V2\TAudioBook;
use App\Models\V2\TComment;
use App\Models\V2\TLike;
use Database\Factories\V2\TcommentFactory;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {





        TAppDetail::factory()->count(1)->create();

        TPost::factory()->create([
            'mmtitle' => 'အစမ်း ပိုစ့် ၁',
            'engtitle' => 'Test Post 1',
            'author' => 'Admin',
            'source' => '5/NwayOoRevo',
            'timeStamp' => '112233445566',
            'mmcontent' => 'မြန်မာစာ',
            'engcontent' => 'English',
            'image' => 'https://jackrevo95.github.io/jackrevo/AudioBook/logo_update-playstore.png',

        ]);
        TPost::factory()->create([
            'mmtitle' => 'အစမ်း ပိုစ့် ၂',
            'engtitle' => 'Test Post 2',
            'author' => 'Admin',
            'source' => '5/NwayOoRevo',
            'timeStamp' => '112233445566',
            'mmcontent' => 'မြန်မာစာ',
            'engcontent' => 'English',
            'image' => 'https://jackrevo95.github.io/jackrevo/AudioBook/logo_update-playstore.png',

        ]);
        TPost::factory()->create([
            'mmtitle' => 'အစမ်း ပိုစ့် ၃',
            'engtitle' => 'Test Post 3',
            'author' => 'Admin',
            'source' => '5/NwayOoRevo',
            'timeStamp' => '112233445566',
            'mmcontent' => 'မြန်မာစာ',
            'engcontent' => 'English',
            'image' => 'https://jackrevo95.github.io/jackrevo/AudioBook/logo_update-playstore.png',

        ]);
        TPost::factory()->create([
            'mmtitle' => 'အစမ်း ပိုစ့် ၄',
            'engtitle' => 'Test Post 4',
            'author' => 'Admin',
            'source' => '5/NwayOoRevo',
            'timeStamp' => '112233445566',
            'mmcontent' => 'မြန်မာစာ',
            'engcontent' => 'English',
            'image' => 'https://jackrevo95.github.io/jackrevo/AudioBook/logo_update-playstore.png',

        ]);
        TPost::factory()->create([
            'mmtitle' => 'အစမ်း ပိုစ့် ၅1',
            'engtitle' => 'Test Post 5',
            'author' => 'Admin',
            'source' => '5/NwayOoRevo',
            'timeStamp' => '112233445566',
            'mmcontent' => 'မြန်မာစာ',
            'engcontent' => 'English',
            'image' => 'https://jackrevo95.github.io/jackrevo/AudioBook/logo_update-playstore.png',

        ]);
        TMusic::factory()->create([
            'mmtitle' => 'အစမ်း ပိုစ့် ၁',
            'engtitle' => 'Test Post 1',
            'path' => 'https://jackrevo95.github.io/jackrevo/Myanmar%20Pyi%20Pwar.mp3',
            'singer' => '5/NwayOoRevo',

            'timestamp' => '112233445566',
            'music_img' => 'https://jackrevo95.github.io/jackrevo/AudioBook/logo_update-playstore.png',

        ]);
        TMusic::factory()->create([
            'mmtitle' => 'အစမ်း ပိုစ့် ၂',
            'engtitle' => 'Test Post 2',
            'path' => 'https://jackrevo95.github.io/jackrevo/Myanmar%20Pyi%20Pwar.mp3',
            'singer' => '5/NwayOoRevo',

            'timestamp' => '112233445566',
            'music_img' => 'https://jackrevo95.github.io/jackrevo/AudioBook/logo_update-playstore.png',

        ]);
        TMusic::factory()->create([
            'mmtitle' => 'အစမ်း ပိုစ့် ၃',
            'engtitle' => 'Test Post 3',
            'path' => 'https://jackrevo95.github.io/jackrevo/Myanmar%20Pyi%20Pwar.mp3',
            'singer' => '5/NwayOoRevo',

            'timestamp' => '112233445566',
            'music_img' => 'https://jackrevo95.github.io/jackrevo/AudioBook/logo_update-playstore.png',

        ]);
        TMusic::factory()->create([
            'mmtitle' => 'အစမ်း ပိုစ့် ၄',
            'engtitle' => 'Test Post 4',
            'path' => 'https://jackrevo95.github.io/jackrevo/Myanmar%20Pyi%20Pwar.mp3',
            'singer' => '5/NwayOoRevo',

            'timestamp' => '112233445566',
            'music_img' => 'https://jackrevo95.github.io/jackrevo/AudioBook/logo_update-playstore.png',

        ]);
        TMusic::factory()->create([
            'mmtitle' => 'အစမ်း ပိုစ့် ၅1',
            'engtitle' => 'Test Post 5',
            'path' => 'https://jackrevo95.github.io/jackrevo/Myanmar%20Pyi%20Pwar.mp3',
            'singer' => '5/NwayOoRevo',

            'timestamp' => '112233445566',
            'music_img' => 'https://jackrevo95.github.io/jackrevo/AudioBook/logo_update-playstore.png',

        ]);


        TAudioBook::factory()->create([
            'mmtitle' => 'အစမ်း ပိုစ့် ၁',
            'engtitle' => 'Test Post 1',
            'path' => 'https://jackrevo95.github.io/jackrevo/Myanmar%20Pyi%20Pwar.mp3',
            'singer' => '5/NwayOoRevo',

            'timestamp' => '112233445566',
            'music_img' => 'https://jackrevo95.github.io/jackrevo/AudioBook/logo_update-playstore.png',

        ]);
        TAudioBook::factory()->create([
            'mmtitle' => 'အစမ်း ပိုစ့် ၂',
            'engtitle' => 'Test Post 2',
            'path' => 'https://jackrevo95.github.io/jackrevo/Myanmar%20Pyi%20Pwar.mp3',
            'singer' => '5/NwayOoRevo',

            'timestamp' => '112233445566',
            'music_img' => 'https://jackrevo95.github.io/jackrevo/AudioBook/logo_update-playstore.png',

        ]);
        TAudioBook::factory()->create([
            'mmtitle' => 'အစမ်း ပိုစ့် ၃',
            'engtitle' => 'Test Post 3',
            'path' => 'https://jackrevo95.github.io/jackrevo/Myanmar%20Pyi%20Pwar.mp3',
            'singer' => '5/NwayOoRevo',

            'timestamp' => '112233445566',
            'music_img' => 'https://jackrevo95.github.io/jackrevo/AudioBook/logo_update-playstore.png',

        ]);
        TAudioBook::factory()->create([
            'mmtitle' => 'အစမ်း ပိုစ့် ၄',
            'engtitle' => 'Test Post 4',
            'path' => 'https://jackrevo95.github.io/jackrevo/Myanmar%20Pyi%20Pwar.mp3',
            'singer' => '5/NwayOoRevo',

            'timestamp' => '112233445566',
            'music_img' => 'https://jackrevo95.github.io/jackrevo/AudioBook/logo_update-playstore.png',

        ]);
        TAudioBook::factory()->create([
            'mmtitle' => 'အစမ်း ပိုစ့် ၅3',
            'engtitle' => 'Test Post 5',
            'path' => 'https://jackrevo95.github.io/jackrevo/Myanmar%20Pyi%20Pwar.mp3',
            'singer' => '5/NwayOoRevo',

            'timestamp' => '112233445566',
            'music_img' => 'https://jackrevo95.github.io/jackrevo/AudioBook/logo_update-playstore.png',

        ]);


        ProfileImages::factory()->create([
            'image' => 'https://jackrevo95.github.io/files/images/profile/boy1.png'
        ]);
        ProfileImages::factory()->create([
            'image' => 'https://jackrevo95.github.io/files/images/profile/boy2.png'
        ]);
        ProfileImages::factory()->create([
            'image' => 'https://jackrevo95.github.io/files/images/profile/boy3.png'
        ]);
        ProfileImages::factory()->create([
            'image' => 'https://jackrevo95.github.io/files/images/profile/boy4.png'
        ]);
        ProfileImages::factory()->create([
            'image' => 'https://jackrevo95.github.io/files/images/profile/girl1.png'
        ]);
        ProfileImages::factory()->create([
            'image' => 'https://jackrevo95.github.io/files/images/profile/girl2.png'
        ]);
        ProfileImages::factory()->create([
            'image' => 'https://jackrevo95.github.io/files/images/profile/girl5.png'
        ]);
        ProfileImages::factory()->create([
            'image' => 'https://jackrevo95.github.io/files/images/profile/girl6.png'
        ]);
        ProfileImages::factory()->create([
            'image' => 'https://jackrevo95.github.io/files/images/profile/girl7.png'
        ]);
        ProfileImages::factory()->create([
            'image' => 'https://jackrevo95.github.io/files/images/profile/girl8.png'
        ]);
        ProfileImages::factory()->create([
            'image' => 'https://jackrevo95.github.io/files/images/profile/girl9.png'
        ]);
        ProfileImages::factory()->create([
            'image' => 'https://jackrevo95.github.io/files/images/profile/girl10.png'
        ]);
        User::factory()->count(5)->create();
        Post::factory()->count(5)->create();

        Music::factory()->count(5)->create();
        AudioBook::factory()->count(5)->create();



        //Like::factory()->count(30)->create();
        //Comment::factory()->count(3)->create();


        // TLike::factory()->count(30)->create();
        // TcommentFactory::factory()->count(3)->create();
    }
}
