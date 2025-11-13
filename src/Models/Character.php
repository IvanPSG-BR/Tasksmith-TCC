<?php

namespace App\Models;

use RedBeanPHP\R as R;

class Character extends \RedBeanPHP\SimpleModel {

    public static function create(int $userId, string $characterName): ?\RedBeanPHP\OODBBean {
        $character = R::dispense('characters');
        $character->user_id = $userId;
        $character->character_name = $characterName;
        $character->level = 1;
        $character->xp = 0;
        $character->hp = 3;
        $character->gold_amount = 0;
        
        R::store($character);
        return $character;
    }

    public function findByUserId(int $userId): ?\RedBeanPHP\OODBBean {
        return R::findOne('characters', 'user_id = ?', [$userId]);
    }

    // A lógica de recompensas foi movida para GameService.php para garantir a persistência.
    // Os métodos applyRewards, addXp, addGold, levelUp, gainHp e penalty foram removidos.
    
    // O método penalty() pode ser recriado aqui se for necessário em outros contextos.
    public function penalty() {
        $this->bean->gold_amount = 0;
        $xp_lost = (int) ($this->bean->xp / 4);
        $this->bean->xp -= $xp_lost;
        $this->bean->hp = 3;
        R::store($this->bean);
    }
}