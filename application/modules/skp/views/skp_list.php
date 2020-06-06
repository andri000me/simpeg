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
                        <a href="<?php echo base_url('skp/create')?>" class="btn btn-primary">Create</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table card-table text-nowrap datatable">
                            <thead>
                                <tr>
                                    <th width="2%">No</th>
                                    <th width="10%">Kegiatan</th>
                                    <th width="10%">Kuantitas</th>
                                    <th width="10%">Satuan</th>
                                    <th width="10%">Kualitas Mutu</th>
                                    <th width="10%">Durasi</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach($skpdata as $skp) : ?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$skp['kegiatan']?></td>
                                    <td><?=$skp['kuantitas']?></td>
                                    <td><?=$skp['satuan']?></td>
                                    <td><?=$skp['kualitas']?></td>
                                    <td><?=$skp['waktu']?></td>
                                    <td>
                                    <?php if($skp['status'] === '0'){ ?>
                                        <a href="<?php echo base_url('skp/create/').$skp['skp_id'] ?>" class="btn btn-info"><i class="fe fe-edit"></i> Edit</a>
                                        <a style="color:white;" class="btn btn-danger" data-toggle="modal" data-target="#ModalHapus<?=$skp['skp_id'];?>"><i style="color:white;" class="fe fe-trash"></i> Hapus</a> 
                                    <?php }else{ ?>
                                        <span class="badge badge-success">Sudah teraprove</span>
                                    <?php } ?>
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

<?php foreach($skpdata as $skp) :?>
<div class="modal fade" id="ModalHapus<?=$skp['skp_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Hapus Jabatan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="form-horizontal" action="<?=base_url().'skp/delete'?>" method="post" enctype="multipart/form-data">
          <!--modal body-->
          <div class="modal-body">
            <input type="hidden" name="skp_id" value="<?=$skp['skp_id']?>"/>
             <p>Apakah Anda yakin mau menghapus SKP :&nbsp;<b><?=$skp['kegiatan']?></b> ?</p>
          </div>
          <!-- end modal body-->
          <div class="modal-footer">
          <button type="button" class="btn btn-default btn-md" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary btn-md"><i class="fe fe-trash"></i> Hapus</button>
        </div>
      </form>
      </div>
    </div>
</div>
<?php endforeach?>