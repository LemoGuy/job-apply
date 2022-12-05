<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
  

        //single user owns 6 jobs
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'example@email.com'
        ]);

        Job::factory(6)->create([
            'user_id' => $user->id
        ]);

        // Job::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags' => 'laravel, javascript', 
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, MA', 
        //     'email' => 'email@email.com', 
        //     'website' => 'https://www.acme.com', 
        //     'description' => 'Lorem ipsum sdfsdfs sdflsdkjnskd skdjnskd ksdjncsd mksdjns ,dm ksldn s,dnskd ksdjnfeo ekjsfnsk efnsklej fskejfnse fksejnfs, ednfksjefske ksjdfns ek,jfsknejf skejfhwieuhfnwek fwjenfwekufnwejfwkejf wkejfwnkejfnhwieoufwejfns,e fjskdn fksejfnksefniweufbskdjfnskd skdjfnskjd fskjdfnksd fksdjfskdnfkshfnowie ekjfnksje fksejfnwkejfr kerj gekrjgn eojr gekrj gerkng menr gmerng ekrjg erk',
        // ]);

        // Job::create([
        //     'title' => 'Full-Stack Engineer',
        //     'tags' => 'laravel, backend, api', 
        //     'company' => 'Stark Industries',
        //     'location' => 'New York, NY', 
        //     'email' => 'email2@email.com', 
        //     'website' => 'https://www.starkindustries.com', 
        //     'description' => 'Lorem ipsum sdfsdfs sdflsdkjnskd skdjnskd ksdjncsd mksdjns ,dm ksldn s,dnskd ksdjnfeo ekjsfnsk efnsklej fskejfnse fksejnfs, ednfksjefske ksjdfns ek,jfsknejf skejfhwieuhfnwek fwjenfwekufnwejfwkejf wkejfwnkejfnhwieoufwejfns,e fjskdn fksejfnksefniweufbskdjfnskd skdjfnskjd fskjdfnksd fksdjfskdnfkshfnowie ekjfnksje fksejfnwkejfr kerj gekrjgn eojr gekrj gerkng menr gmerng ekrjg erk',
        // ]);
    }
}
 