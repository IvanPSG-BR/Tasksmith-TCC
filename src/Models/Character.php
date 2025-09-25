<?php

namespace App\Models;

use RedBeanPHP\R as R;

class Character extends \RedBeanPHP\SimpleModel {

    public function create(int $userId): ?\RedBeanPHP\OODBBean {
        $character = R::dispense('characters');
        $character->user_id = $userId;
        $character->level = 1;
        $character->xp = 0;
        $character->health = 3;
        $character->gold = 0;
        
        R::store($character);
        return $character;
    }

    public function findByUserId(int $userId): ?\RedBeanPHP\OODBBean {
        return R::findOne('characters', 'user_id = ?', [$userId]);
    }

    public function addXp(int $xp_to_add) {
        $this->bean->xp += $xp_to_add;
        // TODO: Adicionar lógica para subir de nível
        R::store($this->bean);
    }

    public function addGold(int $gold_to_add) {
        $this->bean->gold += $gold_to_add;
        R::store($this->bean);
    }
}