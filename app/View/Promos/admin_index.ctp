<div class="page-header">
    <h1 class="page-title">
        Promos
    </h1>
    <div class="pull-right">
        <a
            href="<?php echo $this->webroot.'admin/promos/add' ?>"
            class="btn btn-primary"
            >Add New Promo</a>
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
                                    <th>Sr.no.</th>
                                    <th>Title</th>
                                    <th>Amount/Percentage</th>
                                    <th>Expire</th>
                                    <th>Status</th>
                                   <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if(isset($promo_data) && count($promo_data)){
                                    foreach ($promo_data as $req) {
                                    ?>
                                    <tr>
                                        <td><?php echo $req['Promo']['id']; ?></td>
                                        <td><?php echo ucfirst($req['Promo']['name']); ?></td>
                                        <td>
                                            <?php
                                                 
                                                if($req['Promo']['type'] == 1){
                                                    echo '$'.$req['Promo']['value'];
                                                }else{
                                                    echo $req['Promo']['value'].'%';
                                                }
                                            ?>
                                            
                                        </td>
                                        <td>
                                            <?php echo date('M d, Y',$req['Promo']['end_date']); ?>
                                        </td>
                                         <td class="update_status">
                                            <?php
                                            echo $req['Promo']['status'] == 1 ?
                                                    $this->Html->link(
                                                            'Active', '/promos/admin_update_status/' . $req['Promo']['id'], array(
                                                        'class' => 'label label-success',
                                                        'rel' => $req['Promo']['id']
                                                            )
                                                    ) :
                                                    $this->Html->link(
                                                            'Inactive', '/promos/admin_update_status/' . $req['Promo']['id'], array(
                                                        'class' => 'label label-danger',
                                                        'rel' => $req['Promo']['id']
                                                            )
                                                    )
                                            ;?>
                                        </td>
                                        <td>
                                        <?php
                                            echo $this->Html->link(
                                                        'View', '/admin/promos/view/' . $req['Promo']['id'], array(
                                                    'class' => 'label label-info',
                                                    'rel' => $req['Promo']['id']
                                                        )
                                                ) ;
                                            echo '&nbsp';
                                            echo $this->Html->link(
                                                        'Edit', '/admin/promos/edit/' . $req['Promo']['id'], array(
                                                    'class' => 'label label-success',
                                                    'rel' => $req['Promo']['id']
                                                        )
                                                ) ;
                                           ?>
                                            <button class="label btn-danger del" value="<?php echo $req['Promo']['id']; ?>"  id="del_<?php echo $req['Promo']['id']; ?>" msg="Promo" >Delete</button>
                                        </td>
                                    </tr>
                                    <?php
                                   
                                }
                            }else{ ?>
                            <tr>
                                <td colspan = "4" class="text-center">
                                    <span>No Record Found</span>
                                </td>
                            </tr>
                            <?php } ?>
                            
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
                url: "<?php echo $this->webroot . 'admin/promos/update_status/' ?>" + _id,
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
<style type="text/css">
    div.dataTables_info {
       position: relative !important;
    }
</style>
<?php
//echo $this->Element('pagination');
?>
