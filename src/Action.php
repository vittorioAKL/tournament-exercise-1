<?php

declare(strict_types=1);

namespace Tournament;

/**
 * Class Action.
 */
class Action
{
    public function fight($enemyA, $enemyB){
        $count = 1;

        while (true)
        {
            $enemyA->params['hitPoints'] = $this->hit($enemyA, $enemyB, $count);
            $enemyB->params['hitPoints'] = $this->hit($enemyB, $enemyA, $count);


            if ($enemyA->params['hitPoints'] <= 0) {
                $enemyA->params['hitPoints'] = 0;
                return 0;
            }

            if ($enemyB->params['hitPoints'] <= 0) {
                $enemyB->params['hitPoints' ]= 0;
                return 0;
            }

            $count++;
        }
    }

    public function hit($enemyA, $enemyB, $count)
    {
        $hitPoints = $enemyA->params['hitPoints'];//defence
        $dmg = $enemyB->params['damage'];//attack

        if(isset($enemyA->equip['armor']))
        {
            $dmg -= 3;
        }

        if(isset($enemyB->equip['armor']))
        {
            $dmg -= 1;
        }

        if(isset($enemyA->equip['buckler']) && $enemyA->equip['buckler']['condition'] > 0 && ($count % 2) == 0)
        {
            if($enemyB->params['weapon'] == 'axe')
            {
                $enemyA->equip['buckler']['condition'] -= 1;
            }
            $dmg = 0;
        }

        if($enemyB->params['weapon'] == 'great_sword' && ($count % 3) == 0)
        {
            $dmg = 0;
        }

        if(isset($enemyB->type) && $enemyB->type == 'Vicious' && $count < 3)
        {
            //$dmg += 20;   //this is like in a test description
            $dmg = 20;      //this is correct, because there is an error in the test description: "poison add 20 damages on two first blows"
        }

        if(isset($enemyB->type) && $enemyB->type == 'Veteran' && $enemyB->params['hitPoints'] < ((new Highlander())->params['hitPoints'] * 0.3))
        {
            $dmg *= 2;
        }

        $result = $hitPoints - $dmg;

        if($result < 0)
        {
            $result = 0;
        }

        return $result;

    }
}