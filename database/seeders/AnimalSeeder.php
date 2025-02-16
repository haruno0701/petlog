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
            //["name"=>"柴","kinds"=>1,"appropriateWeight"=>11],
            //["name"=>"チワワ","kinds"=>1,"appropriateWeight"=>2],
            //["name"=>"プードル","kinds"=>1,"appropriateWeight"=>3.5],
            //["name"=>"パグ","kinds"=>1,"appropriateWeight"=>7],
            //["name"=>"チャウチャウ","kinds"=>1,"appropriateWeight"=>24],
            //["name"=>"シェットランド・シープドッグ","kinds"=>1,"appropriateWeight"=>10],
            //["name"=>"ゴールデン・レトリバー","kinds"=>1,"appropriateWeight"=>28],
            //["name"=>"グレート・ピレニーズ","kinds"=>1,"appropriateWeight"=>50],
            //["name"=>"シャム","kinds"=>2,"appropriateWeight"=>3],
            //["name"=>"ブリティッシュショートヘアー","kinds"=>2,"appropriateWeight"=>5],
            //["name"=>"アビシニアン","kinds"=>2,"appropriateWeight"=>3.5],
            //["name"=>"ラグドール","kinds"=>2,"appropriateWeight"=>7.5],
            //["name"=>"ベンガル","kinds"=>2,"appropriateWeight"=>5],
            //["name"=>"スコティッシュフォールド","kinds"=>2,"appropriateWeight"=>4.5],
            ["name"=>"MIX(犬)","kinds"=>1,"appropriateWeight"=>null],
            ["name"=>"MIX(猫)","kinds"=>2,"appropriateWeight"=>null],
        ];
        foreach( $animals as $animal ) {
            Animal::create(['name'=>$animal["name"],'kinds'=>$animal["kinds"],'appropriateWeight'=>$animal["appropriateWeight"]]);
        }
    
    }
}
