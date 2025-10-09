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

    public function addXp(int $xp_to_add) {
        $this->bean->xp += $xp_to_add;
        $this->levelUp($this->bean->level);
        R::store($this->bean);
    }

    private function levelUp(int $current_level) {
        switch ($current_level) {
            case 1:
                $this->bean->xp > 99 ? $this->bean->xp = 0 : null;
                break;
            case 2:
                $this->bean->xp > 149 ? $this->bean->xp = 0 : null;
                break;
            default:
                break;
        }
        $current_level += 1;
        $this->bean->level = $current_level;
        R::store($this->bean);
    }

    public function addGold(int $gold_to_add) {
        $this->bean->gold_amount += $gold_to_add;
        $this->gainHp($this->bean->hp);
        R::store($this->bean);
    }

    private function gainHp(int $current_hp) {
        if ($current_hp <= 0) {
            $this->penalty();
        } else if ($current_hp >= 3) {
            return;
        } else if ($this->bean->gold_amount > 99) {
            $current_hp += 1;
            $this->bean->hp = $current_hp;
        }
        R::store($this->bean);
    }

    private function penalty() {
        $this->bean->gold_amount = 0;
        $xp_lost = (int) $this->bean->xp / 4;
        $this->bean->xp -= $xp_lost;
        $this->bean->hp = 3;
        R::store($this->bean);
    }
}