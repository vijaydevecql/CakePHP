<p>
	<?php
	/*
	  echo $this->Paginator->counter(array(
	  'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	  ));
	 */
	?>	</p>
<div class="paging">
	<ul class="pagination pagination-lg m-0">
		<?php
		echo $this->Paginator->prev(
				'<div class="icondemo vertical-align-middle">
                <i class="icon fa-caret-square-o-left" aria-hidden="true"></i>
                </div>', array(
			'tag' => 'li',
			'disabledTag' => 'a',
			'escape' => false,
				), null, array(
			'class' => 'prev disabled'
				)
		);
		echo $this->Paginator->numbers(
				array(
					'separator' => '',
					'tag' => 'li',
					'currentTag' => 'a',
					'currentClass' => 'active',
				)
		);
		echo $this->Paginator->next(
				'<div class="icondemo vertical-align-middle">
                <i class="icon fa-caret-square-o-right" aria-hidden="true"></i>
              </div>', array(
			'tag' => 'li',
			'disabledTag' => 'a',
			'escape' => false,
				), null, array(
			'class' => 'next disabled'
				)
		);
		//echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</ul>
</div>
