<div class="my-3 my-md-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?=$c_judul?></h3>
                    </div>
                    <div class="card-body" style="padding-bottom:0rem">
                        <div class="container">
                            <div class="card col-md-12">
                                <ul class="nav nav-pills" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="jabatan-tab" data-toggle="tab" href="#jabatan" role="tab" aria-controls="jabatan" aria-selected="true">Tugas Jabatan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tambahan-tab" data-toggle="tab" href="#tambahan" role="tab" aria-controls="tambahan" aria-selected="false">Tugas Tambahan</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="jabatan" role="tabpanel" aria-labelledby="jabatan-tab3">
                                        <form class="form-horizontal" id="formTugasSkp" method="post">
                                            <input type="hidden" name="id_tugas_skp" value="" class="form-control">
                                            <div class="row sectionRow">
                                                <div class="col-sm-2">
                                                    <div>Pilih Kegiatan</div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input list="data_skp" id="skp_id" type="text" name="skp_id" class="form-control" autofocus onchange="return autocom();">
                                                    <span style="color:red;" class="skp_id"></span>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input id="kegiatan" type="text" class="form-control" name="kegiatan" autofocus disabled>
                                                    <span style="color:red;" class="kegiatan"></span>
                                                </div>
                                            </div>
                                            <div class="boxDivider"></div>

                                            <div class="row sectionRow">
                                                <div class="col-sm-2">
                                                    <div>Tanggal dilaksanan</div>
                                                </div> 
                                                <div class="col-sm-4">
                                                    <input type="date" name="tanggal" value="" class="form-control" required>
                                                    <span style="color:red;" class="born_date"></span>
                                                </div>

                                                <div>Jam mulai</div>
                                                <div class="col-sm-2">
                                                    <input type="time" name="statr_time" value="" class="form-control" required>
                                                    <span style="color:red;" class="start_time"></span>
                                                </div>
                                                
                                                <div>Jam selesai</div>
                                                <div class="col-sm-2">
                                                    <input type="time" name="statr_time" value="" class="form-control" required>
                                                    <span style="color:red;" class="start_time"></span>
                                                </div>                
                                            </div>
                                            <div class="boxDivider"></div>

                                            <div class="row sectionRow">
                                                <div class="col-sm-2">
                                                    <div>Hasil (Output)</div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="output" value="" class="form-control" required>
                                                    <span style="color:red;" class="output"></span>
                                                </div>
                                 
                                                <div>Satuan</div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="output" value="" class="form-control" required disabled>
                                                    <span style="color:red;" class="output"></span>
                                                </div>
                                            </div>
                                            <div class="boxDivider"></div>
                                            
                                            <div class="row sectionRow">
                                                <div class="col-sm-10"></div>
                                                <div class="col-sm-2">
                                                    <button type="reset" class="btn btn-default" name="save"><i class="fa fa-refresh"></i> Clear</button>
                                                    <button type="submit" class="btn btn-success" name="save"><i class="fa fa-save"></i> Save</button>
                                                </div>   
                                            </div>
                                        
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="tambahan" role="tabpanel" aria-labelledby="tambahan-tab3">
                                        tambahan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<datalist id="data_skp">
<?php 
  foreach($skpdata as $skp)
  {
    echo "<option value =' ".$skp['skp_id']." '>'".$skp['kegiatan']."'</option>";
  }
?>
</datalist>

<script type="text/javascript"> 
require(['notify', 'jquery'], function(notify, $) {
    
});
</script>
