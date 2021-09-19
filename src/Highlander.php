<?php

declare(strict_types=1);

namespace Tournament;

/**
 * Class Highlander.
 */
class Highlander extends Action
{
    use Item;

    public $type;
    public $enemy;
    public $params;
    public $equip;

    public function __construct($type = false)
    {
        $this->params = array('hitPoints' => 150, 'damage' => 12, 'weapon' => 'great_sword');
        $this->type = $type;
    }


    public function engage($enemy)
    {
        $this->enemy = $enemy;
        $this->fight($this, $this->enemy);
    }

    public function hitPoints()
    {
        return $this->params['hitPoints'];
    }

    public function equip($item = false)
    {
        $it = $this->getItem($item);
        if($it['key'] == 'weapon'){
            $this->params['weapon'] = $it['value']['name'];
            $this->params['damage'] = $it['value']['damage'];
        }elseif($it['key'] == 'defence'){
            $this->equip[$item] = $it['value'];
        }
    }
}