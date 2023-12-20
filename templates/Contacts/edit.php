<h1>Modifier un contact</h1>

<?php
echo $this->Form->create($contact); //prend une entité en paramètre
//echo $this->Form->control('id', ['type'=>'hidden', 'value'=>1]); AGENERER
echo $this->Form->control('id_spf');
echo $this->Form->control('titre');
echo $this->Form->control('nom');
echo $this->Form->control('prenom');
echo $this->Form->control('mail');
echo $this->Form->control('adresse');
echo $this->Form->control('cp');
echo $this->Form->control('ville');
echo $this->Form->control('telephone');
echo $this->Form->control('telephone_bis');
echo $this->Form->control('fonction');
echo $this->Form->control('categorie');
echo $this->Form->control('organisme');

echo $this->Form->button('Modifier');       //renvoie à add
echo $this->Form->end();
?>
