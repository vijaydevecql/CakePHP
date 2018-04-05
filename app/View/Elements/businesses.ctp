<?php
if(!isset($nocategory)) {
	$nocategory = false;
}
 // prx($businesses);
?>

<div id="main-wrapper">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-white">

				<div class="businesses index">
				<div class="panel-heading">
				 	<h2><?php echo __('Businesses'); ?></h2>
				 	<a class="btn btn-primary" href="<?php echo $this->webroot.'/admin/businesses/download_Business' ?>">Click here to download CSV of all Businesses</a>
				 	</div>
				 <div class="panel-body">

                    <div class="table-responsive project-stats table-striped">  
                     <!-- <h3 class="panel-title">Businesses</h3> -->
				
					  <?php echo $this->Html->link(__('Add New Business'), array('controller' => 'Businesses', 'action' => 'add'),[  'class' => 'btn btn-success btn-xs']); ?>
					
					<table cellpadding="0" cellspacing="0" class="table table-bordered table-hover table-striped">
					<thead>
					<tr>
							<th><?php echo $this->Paginator->sort('id'); ?></th>
								<!-- <th><?php echo $this->Paginator->sort('logo'); ?></th> -->
							<th><?php echo $this->Paginator->sort('title'); ?></th>
							<th><?php echo $this->Paginator->sort('countrycode'); ?></th>
							<th><?php echo $this->Paginator->sort('mobileno'); ?></th>
							
							<th><?php echo $nocategory ? '' : $this->Paginator->sort('category_id'); ?></th>
						<!-- 	<th><?php echo $this->Paginator->sort('description'); ?></th>
							<th><?php echo $this->Paginator->sort('logo'); ?></th>
							<th><?php echo $this->Paginator->sort('status'); ?></th> -->


							<th><?php echo $this->Paginator->sort('created'); ?></th>
							<!-- <th><?php echo $this->Paginator->sort('modified'); ?></th> -->
							<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php 
					$x=0;
					// 192.168.1.46/staging/beamapp/app/webroot/img/users/37a85330bae2bc55e381ebbb82933a340afee6ce.jpeg
					 // echo $this->Html->image('http://202.164.42.226/staging/beamapp/app/webroot/img/users/37a85330bae2bc55e381ebbb82933a340afee6ce.jpeg'); 
					foreach ($businesses as $business):
						$x++;
					 ?>
					<tr>
						<td><?php echo h($business['Business']['id']); ?>&nbsp;</td>
						<!-- <?php echo $this->Html->image($wellington['Beef']['picture'], array('alt' => 'story image')); ?> -->
						<!-- <img src="http://202.164.42.226/staging/beamapp/app/webroot/img/users'.$business['Business']['logo']" height="50px" width="50px"> -->
				        <!-- <td><?php echo $this->Html->image('http://202.164.42.226/staging/beamapp/app/webroot/img/users'.$business['Business']['logo']); ?>&nbsp;</td>   -->
						<td><?php echo h($business['Business']['title']); ?>&nbsp;</td>
						<td><?php echo h($business['Business']['countrycode']); ?>&nbsp;</td>
						<td><?php echo h($business['Business']['mobileno']); ?>&nbsp;</td>
						<td>
							<?php echo $nocategory ? '' :  $this->Html->link($business['Category']['name'], array('controller' => 'categories', 'action' => 'view', $business['Category']['id'])); ?>
						</td>
						<!-- <td><?php echo h($business['Business']['description']); ?>&nbsp;</td> -->
						<!-- <td><?php echo h($business['Business']['logo']); ?>&nbsp;</td> -->
						<!-- <td><?php echo h($business['Business']['status']); ?>&nbsp;</td> -->
						<td><?php echo date('M d Y', $business['Business']['created']); ?>&nbsp;</td>
						
						<!-- <td><?php echo h($business['Business']['modified']); ?>&nbsp;</td> -->
					 	<td class="actions">
							<?php echo $this->Html->link(__('View'), array('action' => 'view', $business['Business']['id']),[  'class' => 'btn btn-info btn-xs']); ?>
							<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $business['Business']['id']),[  'class' => 'btn btn-success btn-xs']); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $business['Business']['id']), array(  'class' => 'btn btn-danger btn-xs','confirm' => __('Are you sure you want to delete # %s?', $business['Business']['id']))); ?>
						</td> 
					</tr>
				<?php endforeach; ?>
					</tbody>
					</table>
					</div>
					</div>
					<p>
					<?php
					// echo $this->Paginator->counter(array(
					// 	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					// ));
					?>	</p>
				<!-- 	<div class="paging">
					<?php
						echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
						echo $this->Paginator->numbers(array('separator' => ''));
						echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
					?>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</div>
<?php
if(!$nocategory) {
	echo $this->Element('pagination');
}