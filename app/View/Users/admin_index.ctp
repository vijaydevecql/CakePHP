<?php
//prx($users);
?>
<div class="page-header">
    <h1 class="page-title">
        Users
    </h1>
    <div class="pull-right">
        <a
            href="<?php echo $this->webroot . 'admin/users/add' ?>"
            class="btn btn-primary"
            >Add New User</a>
    </div>
    <br />

</div>


<div class="panel">
    <div class="panel-body container-fluid">
        <div class="row row-lg">
            <div class="col-md-12 table-responsive">
                <!-- Example Basic -->
                <div class="example-wrap ">
                    <div class="example ">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Photo</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) { ?>
                                    <tr>
                                        <td><?php echo $user['User']['id'] ?></td>
                                        <td>
                                            <?php 
                                                $image = 'default_user.png';
                                                if(!empty($user['User']['profile_photo'])){

                                                    $path = APP . 'webroot' . DS . 'files' . DS . 'users'. DS . $user['User']['profile_photo'];
                                                    if(file_exists($path)){
                                                        $image = '100x100'.$user['User']['profile_photo'];
                                                    }
                                                }
                                            ?>
                                            <img src="<?php echo $this->webroot.'files/users/'.$image;?>"  class="user_photo">
                                        </td>
                                        <td><?php echo $user['User']['email'] ?></td>
                                        <td class="update_status">

                                            <?php
                                            echo
                                            $user['User']['status'] == 1 ?
                                                    $this->Html->link(
                                                            'Active', '/users/admin_update_status/' . $user['User']['id'], array(
                                                        'class' => 'label label-success',
                                                        'rel' => $user['User']['id']
                                                            )
                                                    ) :
                                                    $this->Html->link(
                                                            'Inactive', '/users/admin_update_status/' . $user['User']['id'], array(
                                                        'class' => 'label label-danger',
                                                        'rel' => $user['User']['id']
                                                      )
                                                    )
                                            ;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $this->Html->link(
                                                    'View', '/admin/users/view/' . $user['User']['id'], array(
                                                'class' => 'label label-info',
                                                'rel' => $user['User']['id']
                                                    )
                                            );
                                            echo '&nbsp';
                                            echo $this->Html->link(
                                                    'Edit', '/admin/users/edit/' . $user['User']['id'], array(
                                                'class' => 'label label-success',
                                                'rel' => $user['User']['id']
                                                    )
                                            );
                                           ?>
                                            <button class="label btn-danger del" value="<?php echo $user['User']['id']; ?>"  id="del_<?php echo $user['User']['id']; ?>" msg="User" >Delete</button>

                                        </td>
                                    </tr>
                                    <?php
                                } ?>
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
                url: "<?php echo $this->webroot . 'admin/users/update_status/' ?>" + _id,
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
                text: "You want to delete this " + table + " !",
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
                                url: "<?php echo $this->webroot . 'delete/'; ?>",
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
<style type="text/css">
    div.dataTables_info {
       position: relative !important;
    }
</style>
<?php
//echo $this->Element('pagination');
