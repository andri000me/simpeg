<div class="container">
    <div class="row">
        <div class="col-12">
        <?=$this->session->flashdata('message')?'<div class="alert alert-danger" role="alert"><strong>Failed : </strong>'.$this->session->flashdata('message'):''?>
        <?=$this->session->flashdata('message2')?'<div class="alert alert-success" role="alert"><strong>Success : </strong>'.$this->session->flashdata('message2'):''?>
        </div>
    </div>
</div>

<div class="my-3 my-md-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?=$c_judul?></h3>
                    </div>
                    <div class="card-body">
                        <label for="">Filter tanggal</label>
                        <form class="form-horizontal row" action="" method="post">
                            <div class="form-group col-md-3 col-sm-9">
                                <input type="date" name="start_date" id="" class="form-control" required>
                                
                            </div>
                            <div class="form-group col-md-3 col-sm-9">
                                <input type="date" name="end_date" id="" class="form-control" required>
                                
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                                <button type="submit" class="btn btn-success" value="1" name="cari"><i class="fa fa-search"></i> Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <?php 
                        if(!empty($date)){
                            echo "<label>List tugas pada tanggal ".format_date($date['start']).' sampai '.format_date($date['end'])."</label>";
                        }else{
                            echo "<label>Tugas dari 10 hari terakhir</label>";
                        }
                        ?>
                        <div class="table-reponsive">
                            <table class="table card-table text-nowrap wdatatable">
                                <thead>
                                    <tr>
                                        <th width="2%">No</th>
                                        <th width="10%">Pegawai</th>
                                        <th width="10%">Jabatan</th>
                                        <th width="10%">Tugas</th>
                                        <th width="10%">Tanggal</th>
                                        <th width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;
                                foreach($tugas as $t) : ?>
                                    <tr>
                                        <td><?=$no++;?></td>
                                        <td><?=$t->full_name;?></td>
                                        <td><?=$t->jabatan_name.' '.$t->departemen_name;?></td>
                                        <td><?=$t->kegiatan;?></td>
                                        <td><?=format_date($t->tanggal);?></td>
                                        <td>
                                            <a style="color:white;" class="btn btn-info" data-toggle="modal" data-target="#ModalDetail<?=$t->id_tambahan;?>"><i style="color:white;" class="fa fa-search-plus"></i> Detail</a> 
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
</div>

<?php foreach($tugas as $t) : ?>
<div class="modal fade" id="ModalDetail<?=$t->id_tambahan?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Detail Tugas: <?=$t->full_name; ?></h5>
            
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
          <!--modal body-->
          <div class="modal-body">
            <h5>Kegiatan</h5>
            <p><?php echo $t->kegiatan?></p>
            <div class="boxDivider"></div>

            <h5>Tanggal</h5>
            <p><?php echo format_date($t->tanggal)?></p>
            <div class="boxDivider"></div>

            <h5>Jam Pelaksanaan</h5>
            <p><?php echo $t->waktu_mulai.' s/d '.$t->waktu_selesai?></p>
            <div class="boxDivider"></div>

            <h5>Pemberi Tugas</h5>
            <p><?php echo $t->pemberi_tugas?></p>
            <div class="boxDivider"></div>

            <h5>File tambahan</h5>
            <p>
                <?php if ($t->file != 'no-file'): ?>
                    <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                    <a href="<?php echo base_url().'task_come/download/'.$t->id_tambahan; ?>" class=""><i class="fa fa-paperclip"></i><?=$t->file?></a>
                <?php endif?>
            </p>
            <div class="boxDivider"></div>
          </div>
          <!-- end modal body-->
          <div class="modal-footer">
          <button type="button" class="btn btn-default btn-md" data-dismiss="modal">Close</button>
          <a href="<?php echo base_url('task_incoming_daily/approve/').$t->id_tambahan ?>" class="btn btn-primary" name="approve"><i class="fa fa-check"></i> Approve</a>
        </div>
      </div>
    </div>
</div>
<?php endforeach; ?>