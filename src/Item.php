<?php

declare(strict_types=1);

namespace Tournament;

/**
 * Trait Item
 */
Trait Item
{
    public function getItem($item){
        switch ($item){
            case 'buckler':
                return [
                    'key' => 'defence',
                    'value' => [
                        'name' => 'buckler',
                        'condition' => 3]
                ];
            case 'armor':
                return [
                    'key' => 'defence',
                    'value' => [
                        'name' => 'armor']
                ];
            case 'sword':
                return [
                    'key' => 'weapon',
                    'value' => [
                        'name' => 'sword',
                        'damage' => 5]
                ];
            case 'axe':
                return [
                    'key' => 'weapon',
                    'value' => [
                        'name' => 'axe',
                        'damage' => 6]
                ];
            case 'great_sword':
                return [
                    'key' => 'weapon',
                    'value' => [
                        'name' => 'great_sword',
                        'damage' => 12]
                ];

        }
    }
}