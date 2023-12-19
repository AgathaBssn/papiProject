<h1><?= h($element->title) ?></h1>
<p><?= h($element->body) ?></p>
<p><small>Created : <?= h($element->created->format(DATE_RFC1036)) ?></small></p>
<p><?= $this->Html->link('Edit',['action' => 'edit', $element->slug])?></p>
