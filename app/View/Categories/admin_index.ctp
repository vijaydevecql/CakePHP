<div class="page-header">
    <h1 class="page-title">
        Categories
    </h1>
    <div class="pull-right">
        <a 
            href="<?php echo $this->webroot . 'admin/categories/add' ?>" 
            class="btn btn-primary">
            Add New Categories
        </a>
    </div>
    <br />

</div>
<div class="panel">
    <div class="panel-body container-fluid">
        <div class="row row-lg">
            <div class="col-md-12 table-responsive">
                <!-- Example Basic -->
                <div class="example-wrap">
                    <div class="example">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Image</th>
                                    <th>Tile</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                    foreach ($categories as $cat) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td class="top_img">
                                                <?php
                                                    $image = 'default_categories.png';
                                                    if(!empty($cat['Category']['image'])){
                                                         
                                                        $path = APP . 'webroot' . DS . 'files' . DS . 'categories_photo'. DS . $cat['Category']['image'];
                                                        if(file_exists($path)){
                                                            $image = '100x100'.$cat['Category']['image'];
                                                        }
                                                    }
                                                ?>
                                                <img src="<?php echo $this->webroot . 'files/categories_photo/' . $image; ?>" style="width: 100px;">
                                            </td>
                                            <td><?php echo $cat['Category']['title']; ?></td>
                                            <td class="update_status">
                                                <?php
                                                echo
                                                $cat['Category']['status'] == 1 ?
                                                        $this->Html->link(
                                                                'Active', '/categories/admin_update_status/' . $cat['Category']['id'], array(
                                                            'class' => 'label label-success',
                                                            'rel' => $cat['Category']['id']
                                                                )
                                                        ) :
                                                        $this->Html->link(
                                                                'Inactive', '/categories/admin_update_status/' . $cat['Category']['id'], array(
                                                            'class' => 'label label-danger',
                                                            'rel' => $cat['Category']['id']
                                                                )
                                                        )
                                                ;
                                                ?>
                                            </td>
                                            <td>
                                               
                                            <?php
                                              echo $this->Html->link(
                                                        'Edit', '/admin/categories/edit/' . $cat['Category']['id'], array(
                                                    'class' => 'label label-success',
                                                    'rel' => $cat['Category']['id']
                                                        )
                                                );
                                            ?>
                                             <button class="label btn-danger del" value="<?php echo $cat['Category']['id']; ?>"  id="del_<?php echo $cat['Category']['id']; ?>" msg="Category" >Delete</button>
                                        </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                              ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
         table1 = $('#table').DataTable();
        $(document.body).on('click', '.update_status a', function (e) {
            e.preventDefault();
            _this = $(this);
            _id = _this.attr('rel');
            _this.addClass('disabled');
            $.ajax({
                url: "<?php echo $this->webroot . 'admin/categories/update_status/' ?>" + _id,
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
        $('body').on('click', '.del', function () {
            var id = $(this).val();
            $(".showSweetAlert").find('p').text("lead text-muted");
            var table = $(this).attr("msg");
            swal({
                title: "Are you sure?",
                text: "You want to delete this Ads !",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel !",

                closeOnConfirm: false,
                closeOnCancel: false,
                showLoaderOnConfirm: true,
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?php echo $this->webroot . 'delete'; ?>",
                        type: "POST",
                        data: {
                            "id": id,
                            "table": table
                        },
                        dataType: "html",
                        success: function ()
                        {

                            $("#del_" + id).closest("tr").remove();

                            //table1.ajax.reload();
                            //table.ajax.reload();
                            swal("Done!", "It was succesfully deleted!", "success");
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            swal("Error deleting!", "Please try again", "error");
                        }
                    });
                } else
                {
                    swal("Cancelled", table + " is safe :)", "error");
                }
            });
        });
    });
</script>
<?php
//echo $this->Element('pagination');
?>
<style>
    .top_img > img {
        width: 200px;
    }
    .side_img > img {
        width: auto;
    } 
</style>
<style type="text/css">
    div.dataTables_info {
       position: relative !important;
    }
</style>

