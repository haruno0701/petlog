<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Animal;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $animals=[
            ["name"=>"柴","kinds"=>1],
            ["name"=>"チワワ","kinds"=>1],
            ["name"=>"プードル","kinds"=>1],
            ["name"=>"パグ","kinds"=>1],
            ["name"=>"チャウチャウ","kinds"=>1],
            ["name"=>"シェットランド・シープドッグ","kinds"=>1],
            ["name"=>"ゴールデン・レトリバー","kinds"=>1],
            ["name"=>"グレート・ピレニーズ","kinds"=>1],
            ["name"=>"シャム","kinds"=>2],
            ["name"=>"ブリティッシュショートヘアー","kinds"=>2],
            ["name"=>"アビシニアン","kinds"=>2],
            ["name"=>"ラグドール","kinds"=>2],
            ["name"=>"ベンガル","kinds"=>2],
            ["name"=>"スコティッシュフォールド","kinds"=>2],
        ];
        foreach( $animals as $animal ) {
            Animal::create(['name'=>$animal["name"],'kinds'=>$animal["kinds"]]);
        }
    }
}
