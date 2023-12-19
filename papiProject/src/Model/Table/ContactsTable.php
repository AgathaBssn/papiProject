<?php

namespace App\Model\Table;

use Cake\Event\EventInterface;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

class ContactsTable extends Table{
    public function initialize(array $config):void
    {
        $this->setPrimaryKey('id');
        $this->addBehaviors((array)'Timestamp');
    }
    /*public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('id_spf')
            ->notEmptyString('nom')
            ->notEmptyString('prenom');


        return $validator;
    }*/


}
