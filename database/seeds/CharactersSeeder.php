<?php

use App\Enum\Status\CharacterStatusEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CharactersSeeder extends Seeder {
    /**
     * Run the database seeds.
     * @return void
     */
    public function run() {
        return App\Models\Character::create([
            'name_first'    => '太郎',
            'name_last'     => 'テスト',
            'is_foreigner'  => false,
            'password'      => Hash::make('1111'),
            'profile_title' => CharacterStatusEnum::DEFAULT_TITLE,
            'level'         => CharacterStatusEnum::DEFAULT_LEVEL,
            'hp'            => CharacterStatusEnum::DEFAULT_HP,
            'power'         => CharacterStatusEnum::DEFAULT_POWER,
            'defense'       => CharacterStatusEnum::DEFAULT_DEFENSE,
            'wizard'        => CharacterStatusEnum::DEFAULT_WIZARD,
            'speed'         => CharacterStatusEnum::DEFAULT_SPEED,
        ]);
    }
}
