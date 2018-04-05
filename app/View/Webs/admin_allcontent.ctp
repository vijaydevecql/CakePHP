<section class="content-header">
          <h1>
            All Content
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Content</a></li>
            <li class="active">All Content</li>
          </ol>
        </section>
        
 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                
                <div class="box-body">
                 <table id="example1" class="table table-bordered table-striped">
                    <thead>
                     <tr>
							<th>#</th>
							<th>Name</th>
							<th>Content</th>
							<th>Status</th>
							<th>Actions</th>
					</tr>
                    </thead>
	<tbody>
	<?php $count=0;
	foreach ($contents as $content): 
		$count++;
		?>
	<tr>
		<td>
		<?php  echo $count;;
		// echo h($content['Content']['id']); ?>&nbsp;
		</td>
		<td><?php echo h($content['Content']['name']); ?>&nbsp;</td>
		<td><?php echo strip_tags(substr($content['Content']['content'],0,1000)); ?>......&nbsp;</td>
		<td><?php
		echo
		$content['Content']['status'] == 1 ?
		$this->Html->link(
		'Active', 'update_status/' . $content['Content']['id'], array(
		'class' => 'btn btn-success btn-xs',
		'rel' => $content['Content']['id']
		)
		) :
		$this->Html->link(
		'Inactive', 'update_status/' . $content['Content']['id'], array(
		'class' => 'btn btn-danger btn-xs',
		'rel' => $content['Content']['id']
		)
		)
		;
		?>&nbsp;</td>
		<td>
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $club['Club']['id']), array('class' => 'btn btn-default')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $content['Content']['id']), array('class' => 'btn btn-default')); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $club['Club']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $club['Club']['id']), 'class' => 'btn btn-default')); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	<!--  <tfoot>
	 <tr>
							<th>Id</th>
							<th>Name</th>
							<th>Content</th>
							<th>Status</th>
							<th>Actions</th>
					</tr>
	</tfoot> -->
	</table>
	</div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
	
