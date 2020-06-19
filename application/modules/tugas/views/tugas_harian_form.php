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
                        <div class="col-md-4">
                            <a href="<?php echo base_url('tugas')?>" class="btn btn-primary">Tugas Jabatan</a> &nbsp;
                            <a href="<?php echo base_url('tugas/tugas_harian')?>" class="btn btn-primary">Tugas Harian</a>
                        </div> 
                    </div>
                    <div class="card-body">
                    <h3>Tugas Harian</h3>

                    <form autocomplete="off" action="<?php echo base_url('tugas/saveTugasHarian')?>" class="form-horizontal" enctype="multipart/form-data" method="post">
                        <input type="hidden" id="id_harian" name="id_harian" value="" class="form-control">

                        <div class="row sectionRow">
                            <div class="col-sm-2">
                                <div>Kegiatan</div>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="kegiatan" id="kegiatan" value="" class="form-control">
                                <span style="color:red;" class="kegiatan"><?php echo form_error('kegiatan')?></span>
                            </div>
                        </div>
                        <div class="boxDivider"></div>

                        <div class="row sectionRow">
                            <div class="col-sm-2">
                                <div>Tanggal dilaksanan</div>
                            </div> 
                            <div class="col-sm-4">
                                <input type="date" name="tanggal" value="" class="form-control">
                                <span style="color:red;" class="tanggal"><?php echo form_error('tanggal')?></span>
                            </div>

                            <div>Jam mulai</div>
                            <div class="col-sm-2">
                                <input type="time" name="start_time" value="" class="form-control">
                                <span style="color:red;" class="start_time"><?php echo form_error('start_time')?></span>
                            </div>
                            
                            <div>Jam selesai</div>
                            <div class="col-sm-2">
                                <input type="time" name="end_time" value="" class="form-control">
                                <span style="color:red;" class="end_time"><?php echo form_error('end_time')?></span>
                            </div>                
                        </div>
                        <div class="boxDivider"></div>

                        <div class="row sectionRow">

                            <div class="col-sm-2">
                                <div>Volume</div>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="volume" id="volume" value="" class="form-control">
                                <span style="color:red;" class="volume"><?php echo form_error('volume')?></span>
                            </div>
                           
                            <div>Hasil (Output)</div>
                            <div class="col-sm-3">
                                <input type="text" name="output" id="output" value="" class="form-control">
                                <span style="color:red;" class="output"><?php echo form_error('output')?></span>
                            </div>

                            <div>Satuan</div>
                            <div class="col-sm-3">
                                <input type="text" id="satuan" name="satuan" value="" class="form-control">
                                <span style="color:red;" class="satuan"><?php echo form_error('satuan')?></span>
                            </div>
                        </div>
                        <div class="boxDivider"></div>

                        <div class="row sectionRow">
                            <div class="col-sm-2">
                                <div>Pemberi Tugas</div>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" name="pemberi_tugas" id="pemberi_tugas" value="" class="form-control">
                                <span style="color:red;" class="pemberi_tugas"><?php echo form_error('pemberi_tugas')?></span>
                            </div>
                        </div>
                        <div class="boxDivider"></div>
                        
                        <div class="row sectionRow">
                            <div class="col-sm-2">
                                <div>Dokumen</div>
                            </div>
                            <div class="col-sm-4">
                                <input type="radio" name="tab" value="0" onclick="show1();" />
                                <label class="control-label" style="font-size:13px;"><b>Tidak Ada</b></label>       
                            &nbsp;
                                <input type="radio" name="tab" value="1" onclick="show2();" />
                                <label class="control-label" style="font-size:13px;"><b>Ada Dokumen</b></label>

                                <span style="color:red;" class="satuan"><?php echo form_error('tab')?></span>
                            </div>
                            
                        </div>

                        <div id="div" class="row sectionRow" style="display:none">
                            <div class="col-sm-4">
                                <input type="file" name="files" id="files" class="form-control" value="">
                            </div>
                        </div>
                        
                        <div class="boxDivider"></div>

                        <div class="row sectionRow">
                            <div class="col-sm-10"></div>
                            <div class="col-sm-2">
                                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Clear</button>
                                <button type="submit" class="btn btn-success" name="saveTugasTambahan"><i class="fa fa-save"></i> Save</button>
                            </div>   
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript"> 

function show1(){
    document.getElementById('div').style.display ='none';
}
function show2(){
    document.getElementById('div').style.display = 'block';
}
</script>