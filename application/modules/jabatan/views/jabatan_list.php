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
                        <a href="<?php echo base_url('jabatan/create')?>" class="btn btn-primary">Create</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table card-table text-nowrap datatable">
                        <thead>
                            <tr>
                            <th width="2%">No</th>
                            <th width="10%">Jabatan</th>
                            <th width="10%">Departemen</th>
                            <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach($jabatan as $jab) : ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$jab->jabatan_name?></td>
                                <td><?=$jab->departemen_name?></td>
                                <td>
                                    <a href="<?php echo base_url('jabatan/create/').$jab->id_jabatan ?>" class="btn btn-info"><i class="fe fe-edit"></i> Edit</a>
                                    <a style="color:white;" class="btn btn-danger" data-toggle="modal" data-target="#ModalHapus<?=$jab->id_jabatan;?>"><i style="color:white;" class="fe fe-trash"></i> Hapus</a> 
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach($jabatan as $jab) : ?>
<div class="modal fade" id="ModalHapus<?=$jab->id_jabatan?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Hapus Jabatan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="form-horizontal" action="<?=base_url().'jabatan/delete'?>" method="post" enctype="multipart/form-data">
          <!--modal body-->
          <div class="modal-body">
            <input type="hidden" name="id_jabatan" value="<?=$jab->id_jabatan;?>"/>
             <p>Apakah Anda yakin mau menghapus Level:&nbsp;<b><?=$jab->jabatan_name.' '.$jab->departemen_name;?></b> ?</p>
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