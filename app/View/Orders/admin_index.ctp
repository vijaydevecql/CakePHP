<div class="page-header">
    <h1 class="page-title">
        Order Listing
    </h1>
    <div class="pull-right">
        <a
            href="<?php echo $this->webroot . 'admin/orders/add' ?>"
            class="btn btn-primary"
            >Add New Order</a>
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
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>Transaction id</th>
                                    <th>Amount Paid</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                      $id = 1;
                                    foreach ($Order_datas as $item) {

                                    ?>
                                    <tr>
                                        <td><?php echo $id;?></td>
                                        <td>
                                              <?php echo $item['User']['first_name'] ." ".$item['User']['last_name'] ?>
                                        </td>
                                        <td>
                                              <?php echo $item['Transaction']['transactionid'] ?>
                                        </td>
                                        <td>
                                            <?php echo $item['Order']['amount_paid'] ?>
                                        </td>
                                        <td><?php echo $item['Address']['address'] ?></td>
                                        <td class="update_status">
										                       complete
                                        </td>
                                    </tr>
                                    <?php
                               $id++; }
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
                url: "<?php echo $this->webroot . 'admin/orders/update_status/' ?>" + _id,
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
