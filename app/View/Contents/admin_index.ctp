<?php
$pageData = $this->params->params['paging']['LanguageValue'];
// prx($pageData);
$i = ($pageData['page'] - 1) * $pageData['limit'] +1 ;
?>
<div class="page-header">
    <h1 class="page-title">
        Language Value
    </h1>
    <div class="pull-right">
        <a
            href="<?php echo $this->webroot.'admin/LanguageValues/add' ?>"
            class="btn btn-primary"
            >Add New Language Value</a>
    </div>
    <br />

</div>
<div class="panel">
    <div class="panel-body container-fluid">
        <div class="row row-lg">
            <div class="col-md-12">
                <!-- Example Basic -->
                <div class="example-wrap">
                    <div class="example table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Language</th>
                                    <th>Language Key</th>
                                    <th>Language Value</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                              
                                //prx($LanguageValues);
                                foreach ($LanguageValues as $cat) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $cat['Language']['name'];?></td>
                                        <td><?php echo $cat['LanguageKey']['name'];?></td>
                                        <td><?php echo $cat['LanguageValue']['value'];?></td>
                                        <td>
                                        <?php
                                            echo $this->Html->link(
                                                        'Edit', '/LanguageValues/edit/' . $cat['LanguageValue']['id'], array(
                                                    'class' => 'label label-success',
                                                    'rel' => $cat['LanguageValue']['id']
                                                        )
                                                ) ;
                                            echo '&nbsp';
                                                echo $this->Html->link(
                                                        'Delete', '/LanguageValues/delete/' . $cat['LanguageValue']['id'], array(
                                                    'class' => 'label label-danger',
                                                    'rel' => $cat['LanguageValue']['id']
                                                        )
                                                ) ;
                                            echo '&nbsp';

                                            ?>

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
                <?php
                    echo $this->Element('pagination');
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(document.body).on('click', '.update_status a', function (e)
        {
            e.preventDefault();
            _this = $(this);
            _id = _this.attr('rel');
            _this.addClass('disabled');
            $.ajax({
                url: "<?php echo $this->webroot . 'admin/LanguageValues/update_status/' ?>" + _id,
                cache: false
            }).done(function (html) {
                if (html === '0') {
                    _this.removeClass('label-danger');
                    _this.addClass('label-success');
                    _this.text('Active');
                }
                if (html === '1') {
                    _this.removeClass('label-success');
                    _this.addClass('label-danger');
                    _this.text('Inactive');
                }
                _this.removeClass('disabled');
            });

        });
    });
</script>

