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
                    <a href="<?php echo base_url('skp_report')?>" class="btn btn-info"><i class="fa fa-mail-reply"></i> Back</a> &nbsp;
                    <h3 class="card-title"><?=$c_judul.': '.$user['full_name'].' /'.$user['jabatan_name'].' '.$user['departemen_name']?></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table card-table text-nowrap ddatatable">
                            <thead>
                                <tr>
                                    <th width="2%">No</th>
                                    <th width="10%">Kegiatan</th>
                                    <th width="10%">Kuantitas</th>
                                    <th width="10%">Satuan</th>
                                    <th width="10%">Mutu</th>
                                    <th width="10%">Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no=1;
                                foreach($skp as $s) :?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?=$s->kegiatan; ?></td>
                                    <td><?=$s->kuantitas; ?></td>
                                    <td><?=$s->satuan; ?></td>
                                    <td><?=$s->kualitas; ?></td>
                                    <td><?=$s->waktu; ?></td>
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