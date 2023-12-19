<h1>Edit Article</h1>

<?php
echo $this->Form->create($article); //prend une entité en paramètre
echo $this->Form->control('user_id', ['type'=>'hidden', 'value'=>1]);
echo $this->Form->control('title');
echo $this->Form->control('body');
echo $this->Form->button('Edit   Article');       //renvoie à add
echo $this->Form->end();
?>
