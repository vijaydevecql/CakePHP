<div class="contentMagemnets view">
<h2><?php echo __('Content Magemnet'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($contentMagemnet['ContentMagemnet']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Key'); ?></dt>
		<dd>
			<?php echo h($contentMagemnet['ContentMagemnet']['key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($contentMagemnet['ContentMagemnet']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($contentMagemnet['ContentMagemnet']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($contentMagemnet['ContentMagemnet']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Content Magemnet'), array('action' => 'edit', $contentMagemnet['ContentMagemnet']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Content Magemnet'), array('action' => 'delete', $contentMagemnet['ContentMagemnet']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $contentMagemnet['ContentMagemnet']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Content Magemnets'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Content Magemnet'), array('action' => 'add')); ?> </li>
	</ul>
</div>
