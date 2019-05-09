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
            'name_first'       => '太郎',
            'name_last'        => 'テスト',
            'is_not_foreigner' => true,
            'password'         => Hash::make('asdf'),
            'profile_title'    => CharacterStatusEnum::DEFAULT_TITLE,
            'level'            => CharacterStatusEnum::DEFAULT_LEVEL,
            'hp'               => CharacterStatusEnum::DEFAULT_HP,
            'attack'           => CharacterStatusEnum::DEFAULT_ATTACK,
            'defense'          => CharacterStatusEnum::DEFAULT_DEFENSE,
        ]);
    }
}
