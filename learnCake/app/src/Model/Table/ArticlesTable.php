<?php

namespace App\Model\Table; //toujours le chemin depuis APP

use Cake\Event\EventInterface;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

//obligatoire

class ArticlesTable extends Table{
    public function initialize(array $config):void
    {
        $this->addBehaviors((array)'Timestamp'); //enregistre toujours la date d'ajout
        $this->setPrimaryKey('id'); //par défaut la clé c'est id sinon faut changer

    }
    public function beforeSave(EventInterface $event, $entity, $options) //génère le titre
    {
        if ($entity->isNew() && !$entity->slug)
        {
            $sluggedTitle = Text::slug($entity->title);
            $entity->slug = substr($sluggedTitle, 0,191);
        }
    }
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('title', 'ce champ peut pas etre vide')
            ->minLength('title', 10)    //, puis le message d'erreur
            ->maxLength('title', 255)

            ->notEmptyString('body')
            ->minLength('body', 10);
        return $validator;
    }
}
