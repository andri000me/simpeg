<div class="container">
    <div class="row">
        <div class="col-12">
        <?=$this->session->flashdata('message')?'<div class="alert alert-danger" role="alert"><strong>Failed : </strong>'.$this->session->flashdata('message'):''?>
        <?=$this->session->flashdata('message2')?'<div class="alert alert-success" role="alert"><strong>Success : </strong>'.$this->session->flashdata('message2'):''?>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?=$c_judul;?></h3>
                </div>
                <div class="card-body" style="padding-bottom:0rem">
                    <form class="form-horizontal" action="<?php echo site_url('menu/save_setting');?>" enctype="multipart/form-data" method="post">
                        <div class="row sectionRow">
                            <div class="col-sm-3">
                                <div>Tampilkan Menu berdasarkan Role</div>
                            </div>
                            <div class="col-sm-3">
                            <?php echo form_dropdown('show_menu', array('1' => 'YA', '0' => 'TIDAK'),$setting['value'],array('class' => 'form-control col-md-6')); ?>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-success" name="save"><i class="fe fe-check"></i> Apply</button>
                            </div>
                        </div>
                        <div class="boxDivider"></div>
                    </form>  
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Menu List</h3>
                    <div class="card-options">
                        <a href="<?php echo base_url('menu/create') ?>" class="btn btn-primary"><i class="fe fe-list"></i> Add Menu</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table card-table text-nowrap datatable">
                            <thead>
                                <tr>
                                    <th class="w-1">No.</th>
                                    <th>Menu</th>
                                    <th>Url</th>
                                    <th>Icon</th>
                                    <th>Sub Menu</th>
                                    <th>Aktive</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $no = 1;
                            foreach($menu as $m): ?>
                                <tr>
                                    <td><?=$no++; ?></td>
                                    <td><?=$m['title']; ?></td>
                                    <td><?=$m['url']; ?></td>
                                    <td><?=$m['icon']; ?></td>
                                    <td><?=$m['is_main_menu']; ?></td>
                                    <td><?=string_is_aktif($m['is_active']); ?></td>
                                    <td>
                                        <a href="<?php echo base_url('menu/create/').$m['menu_id'] ?>" class="btn btn-primary" data-toggles="tooltip" title="Edit"><span class="fe fe-edit"></span>Edit</a>
                                        <a style="color:white;" class="btn btn-danger" data-toggle="modal" data-target="#ModalHapus<?=$m['menu_id'];?>"><i style="color:white;" class="fe fe-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($menu as $m) : ?>
<div class="modal fade" id="ModalHapus<?=$m['menu_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Hapus Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="form-horizontal" action="<?=base_url().'menu/delete'?>" method="post" enctype="multipart/form-data">
          <!--modal body-->
          <div class="modal-body">
            <input type="hidden" name="menu_id" value="<?=$m['menu_id'];?>"/>
             <p>Apakah Anda yakin mau menghapus Menu:&nbsp;<b><?=$m['title'];?></b> ?</p>
          </div>
          <!-- end modal body-->
          <div class="modal-footer">
          <button type="button" class="btn btn-default btn-md" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary btn-md" id="simpan"><i class="fe fe-trash"></i> Hapus</button>
        </div>
      </form>
      </div>
    </div>
</div>
<?php endforeach; ?>

<script>
    require(['datatables','notify', 'jquery'], function(datatable,notify, $) {
        $('.datatable').DataTable();
        
        //alert
        var msg = '<?php echo $this->session->flashdata('success')?>';
        alertSuccess(msg);
    
    });
</script>