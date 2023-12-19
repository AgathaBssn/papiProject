<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Article extends Entity
{
    protected array $_accessible= [         //tous ce qui est modifiable ou non
        '*' => true,
        'id' => false,
        'slug' => false
    ];
}
