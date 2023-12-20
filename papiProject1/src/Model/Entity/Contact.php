<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Contact extends Entity
{
    protected array $_accessible= [         //clé obligatoire : id, id_spf, nom, prenom
        '*' => true,
        'id' => false
    ];
}
