<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$n = 12;

        $title = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit';

        for ($x=1; $x<=$n; $x++) {
            $articles[] = [
                'title' => "{$title} {$x}",
                'url_alias' => str_slug($title . '-' . $x),
                'author_alias' => 'Deivi Peña',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed venenatis eu ipsum rhoncus ultricies. Nulla risus magna, luctus vitae fringilla id, vehicula quis sapien. Proin porttitor ante ac erat aliquam, ac molestie arcu pretium.',
                'image' => 'img/article_demo.jpg',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed venenatis eu ipsum rhoncus ultricies. Nulla risus magna, luctus vitae fringilla id, vehicula quis sapien. Proin porttitor ante ac erat aliquam, ac molestie arcu pretium. Maecenas sed dolor mi. Nulla purus felis, lacinia ut mollis at, bibendum et libero. Pellentesque bibendum eu nunc a maximus. Mauris faucibus et est nec cursus. Mauris arcu massa, porttitor vel vestibulum vitae, molestie quis lorem. Suspendisse varius libero eget sem posuere dapibus. Proin nec sapien elit.</p><p>Aenean aliquet ut felis id tristique. Sed dictum urna vitae faucibus convallis. Sed lacinia, ex nec malesuada semper, justo nibh fermentum ante, ac pulvinar metus sem id nisi. Curabitur eget nulla dolor. Integer semper tincidunt augue ut auctor. Quisque posuere augue ipsum, non congue est accumsan vel. Nullam nec sapien vel ligula gravida eleifend. Donec eget odio sed nunc pulvinar ullamcorper. Phasellus hendrerit massa in erat placerat posuere. Sed congue dolor massa, ac finibus augue euismod sed. Integer quis metus in odio porttitor lobortis vitae in velit. Morbi vitae leo vel nisl lobortis lobortis id ultricies massa.</p><p>Maecenas sit amet pellentesque dolor. Nam consequat orci in libero laoreet ullamcorper. Suspendisse vel leo odio. Nunc id ante lectus. Suspendisse fringilla finibus iaculis. Morbi sed eleifend tellus. Integer imperdiet felis sed ipsum suscipit, nec iaculis diam ultricies. Duis vel tellus et tellus tempus malesuada. In sed nibh et lorem cursus venenatis quis sed velit.</p><p>Pellentesque ut leo porttitor, dictum massa eu, laoreet lorem. Aenean pretium lacinia nisi, ut posuere sapien tincidunt pretium. Curabitur sodales risus sit amet sodales dignissim. Integer venenatis imperdiet nunc sed pellentesque. Sed tristique nunc et consectetur scelerisque. Morbi neque diam, posuere vel tortor in, dictum pulvinar dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque posuere, metus in venenatis dapibus, urna sapien gravida ligula, vel feugiat erat elit ac quam. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tempor dolor id massa dignissim condimentum. Donec varius tortor orci, quis maximus nisl pellentesque quis. Etiam vulputate dui eget elit finibus elementum. Praesent gravida interdum turpis.</p><p>Aliquam commodo, ipsum in fermentum elementum, libero nisi egestas sem, id tincidunt nunc lorem non justo. Sed lobortis consectetur tellus, nec maximus sapien scelerisque in. Suspendisse quis laoreet elit, et interdum arcu. Fusce tincidunt ipsum purus, et egestas massa tempor vitae. Vivamus ultricies sagittis libero id mattis. Vivamus quis blandit urna, quis ultricies dui. Nulla at enim magna. Vestibulum et turpis urna. Suspendisse at finibus nunc. Mauris tincidunt ipsum quis varius ullamcorper. Maecenas vitae odio vitae ipsum vulputate cursus. Phasellus eu porttitor velit. In venenatis dolor eu congue iaculis.</p>',
                'category_id' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('articles')->insert($articles);
    }
}
