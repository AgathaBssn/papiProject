<h1>Add Article</h1>

<?php
    echo $this->Form->create($article); //prend une entité en paramètre
    echo $this->Form->control('user_id', ['type'=>'hidden', 'value'=>1]);
    echo $this->Form->control('title');
    echo $this->Form->control('body');
    echo $this->Form->button('Save Article');       //renvoie à add
    echo $this->Form->end();
?>
