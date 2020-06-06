<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?=$c_judul?></h3>
                    <div class="card-options">
                        <a href="<?php echo base_url('userlevel') ?>" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table card-table text-nowrap vdatatable">
                        <thead>
                            <tr>
                                <th width="2%">No</th>
                                <th width="10%">Nama Menu</th>
                                <th style="text-align:center" width="10%">Beri Hak Akses</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            $i=1;
                            $role_id = $this->uri->segment(3);
                            foreach ($menu as $m) {
                                echo "<tr>
                                        <td>$i</td>
                                        <td>$m->title</td>
                                        <td align='center'><input type='checkbox' ".  checked_akses($role_id, $m->menu_id)." onClick='kasi_akses($m->menu_id,$role_id)'></td>
                                    </tr>";
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


<script type="text/javascript">
    require(['datatables','notify', 'jquery'], function(datatable,notify, $) {
        $('.datatable').DataTable();
    });

    function kasi_akses(menu_id, role_id){  
            var menu_id = menu_id;
            var level = role_id;
            $.ajax({
              url:"<?php echo base_url()?>userlevel/kasi_akses_ajax",
              data:"menu_id=" + menu_id + "&level="+ level ,
              success: function(html)
              { 
                alertSuccess('data has changes!!!');
              }
          });
    }
</script>