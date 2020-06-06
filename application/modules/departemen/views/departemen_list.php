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
                    <h3 class="card-title"><?=$c_judul?></h3>
                    <div class="card-options">
                        <a href="<?php echo base_url('departemen/create')?>" class="btn btn-primary">Create</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table card-table text-nowrap datatable">
                        <thead>
                            <tr>
                                <th width="2%">No</th>
                                <th width="10%">Nama Departemen</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $i = 1;
                        foreach($data as $dep ): ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$dep->departemen_name?></td>
                                <td>
                                    <a href="<?php echo base_url('departemen/create/').$dep->id_departemen ?>" class="btn btn-info"><i class="fe fe-edit"></i> Edit</a>
                                    <a style="color:white;" class="btn btn-danger" data-toggle="modal" data-target="#ModalHapus<?=$dep->id_departemen;?>"><i style="color:white;" class="fe fe-trash"></i> Hapus</a>
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

<?php foreach($data as $dep) : ?>
<div class="modal fade" id="ModalHapus<?=$dep->id_departemen?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Hapus Departemen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="form-horizontal" action="<?=base_url().'departemen/delete'?>" method="post" enctype="multipart/form-data">
          <!--modal body-->
          <div class="modal-body">
            <input type="hidden" name="id_departemen" value="<?=$dep->id_departemen;?>"/>
             <p>Apakah Anda yakin mau menghapus Departemen:&nbsp;<b><?=$dep->departemen_name;?></b> ?</p>
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
<?php endforeach?>

<script>
    require(['datatables','notify', 'jquery'], function(datatable,notify, $) {
        $('.datatable').DataTable();
    
    });
</script>