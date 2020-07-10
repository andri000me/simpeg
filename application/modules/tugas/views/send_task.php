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
                        <form autocomplete="off" action="<?php echo base_url('send_task/saving')?>" class="form-horizontal" enctype="multipart/form-data" method="post">
                            
                            <div class="row sectionRow">
                                <div class="col-sm-2">
                                    <div>Tanggal</div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="date" name="tanggal" value="" class="form-control">
                                    <span style="color:red;" class="tanggal"><?php echo form_error('tanggal')?></span>
                                </div>
                            </div>
                            <div class="boxDivider"></div>

                            <div class="row sectionRow">
                                <div class="col-sm-2">
                                    <div>Kegiatan</div>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="kegiatan" value="" class="form-control">
                                    <span style="color:red;"><?php echo form_error('kegiatan')?></span>
                                </div>
                            </div>
                            <div class="boxDivider"></div>

                            <div class="row sectionRow">
                                <div class="col-sm-2">
                                    <div>Output</div>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="output" value="" class="form-control">
                                    <span style="color:red;"><?php echo form_error('output')?></span>
                                </div>

                                <div>Satuan</div>
                                <div class="col-sm-2">
                                    <select name="satuan" class="form-control" value="">
                                        <option disabled selected></option>
                                        <option value="surat">Surat</option>
                                        <option value="dokumen">Dokumen</option>
                                        <option value="berkas">Berkas</option>
                                    </select>
                                    <span style="color:red;" class="gender"><?php echo form_error('satuab')?></span>
                                </div>

                                <div>Volune</div>
                                <div class="col-sm-2">
                                    <input type="text" name="volume" value="" class="form-control">
                                    <span style="color:red;"><?php echo form_error('volume')?></span>
                                </div>
                            </div>
                            <div class="boxDivider"></div>

                            <div class="row sectionRow">
                                <div class="col-sm-2">
                                    <div>Keterangan</div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="keterangan" value="" class="form-control">
                                    <span style="color:red;"><?php echo form_error('keterangan')?></span>
                                </div>
                            </div>
                            <div class="boxDivider"></div>

                            <div class="row sectionRow">
                                <div class="col-sm-2">
                                    <div>Pemberi Tugas</div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="pemberi_tugas" value="" class="form-control">
                                    <span style="color:red;"><?php echo form_error('pemberi_tugas')?></span>
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
                            <div class="row sectionRow" id="div" style="display:none">
                                <div class="col-sm-4">
                                    <input type="file" name="files" id="files" class="form-control" value="">
                                </div>
                            </div>
                            <div class="boxDivider"></div>
                            

                            <div class="row sectionRow">
                                <div class="col-sm-10"></div>
                                <div class="col-sm-2">
                                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Clear</button>
                                    <button type="submit" class="btn btn-success" name="saveTugasTambahan"><i class="fa fa-save"></i> Kirim</button>
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