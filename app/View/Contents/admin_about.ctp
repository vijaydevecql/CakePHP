
<div class="page-header">
    <h1 class="page-title">
        About
    </h1>
    <div class="pull-right">
        <a
            href="<?php echo $this->webroot.'admin/abouts/add' ?>"
            class="btn btn-primary"
            >Add New About</a>
    </div>
    <br />

</div>
<div class="panel">
    <div class="panel-body container-fluid">
        <div class="row row-lg">
            <div class="About-md-12">
                <!-- Example Basic -->
                <div class="example-wrap">
                    <div class="example table-responsive">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                   $id = 1;
                                //prx($Abouts);
                                foreach ($abouts as $about) {

                                    ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $about['About']['name'];?></td>
                                        <td><?php echo $about['About']['description'];?></td>

                                         <td class="top_img">
                                                <?php
                                                    $image = 'default_product_photo.jpg';
                                                    if(!empty($about['About']['image'])){
                                                         
                                                        $path = APP . 'webroot' . DS . 'files' . DS . 'images'. DS . $about['About']['image'];
                                                        if(file_exists($path)){
                                                            $image = '100x100'.$about['About']['image'];
                                                        }
                                                    }
                                                ?>
                                                <img src="<?php echo $this->webroot . 'files/images/' . $image; ?>"  style="width: 100px;">
                                            </td>
                                            <td class="update_status">
                                            <?php
                                            echo
                                           ($about['About']['status'] == 1 )?
                                                    $this->Html->link(
                                                            'Active', '/abouts/update_status/' . $about['About']['id'], array(
                                                        'class' => 'label label-success',
                                                        'rel' => $about['About']['id']
                                                            )
                                                    ) :
                                                    $this->Html->link(
                                                            'Inactive', '/abouts/update_status/' . $about['About']['id'], array(
                                                        'class' => 'label label-danger',
                                                        'rel' => $about['About']['id']
                                                            )
                                                    )
                                            ;
                                            ?>
                                        </td>
                                        <td>
                                        <?php
                                            echo $this->Html->link(
                                                        'Edit', '/admin/abouts/edit/' . $about['About']['id'], array(
                                                    'class' => 'label label-success',
                                                    'rel' => $about['About']['id']
                                                        )
                                                ) ;
                                            echo '&nbsp';
                                                echo $this->Html->link(
                                                        'Delete', '/admin/abouts/delete/' . $about['About']['id'], array(
                                                    'class' => 'label label-danger',
                                                    'rel' => $about['About']['id']
                                                        )
                                                ) ;
                                            echo '&nbsp';

                                            ?>

                                        </td>
                                    </tr>
                                    <?php
                                    $id++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
               <!--  <?php
                    //echo $this->Element('pagination');
                ?> -->
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
$('#table').DataTable();
        $(document.body).on('click', '.update_status a', function (e)
        {
            e.preventDefault();
            _this = $(this);
            _id = _this.attr('rel');
            _this.addClass('disabled');
            $.ajax({
                url: "<?php echo $this->webroot . 'admin/Abouts/update_status/' ?>" + _id,
                cache: false
            }).done(function (html) {
                if (html === '1') {
                    _this.removeClass('label-danger');
                    _this.addClass('label-success');
                    _this.text('Active');
                }
                if (html === '2') {
                    _this.removeClass('label-success');
                    _this.addClass('label-danger');
                    _this.text('Inactive');
                }
                _this.removeClass('disabled');
            });

        });
        
    });
</script>


