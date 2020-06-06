<style type="text/css">
    #imgView{  
        width: 100px; 
        height:100px; 
        padding: 10px; 
        border-radius:50%;
        border: 1px solid #CCCCCC;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-12">
        <h3><?=$c_judul?></h3>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
        <?=$this->session->flashdata('message')?'<div class="alert alert-danger" role="alert"><strong>Failed : </strong>'.$this->session->flashdata('message'):''?>
        <?=$this->session->flashdata('message2')?'<div class="alert alert-success" role="alert"><strong>Success : </strong>'.$this->session->flashdata('message2'):''?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="container">
            <div class="card card-primary col-md-12">
                <div class="card-profile-widget">
                    <div class="card-body">
                        <br>
                        <img alt="image" class="profile-widget-picture rounded-circle" src="<?php echo $url.$config['logo'];?>">
                        <h3 class="text-center"><?=strtoupper($config['name_app'])?></h3>
                        <p class="text-muted text-center"><?=$config['instansi']?></p>
                    </div>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Email:&nbsp;</b> <a class="pull-right"><?=$config['email']?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Pimpinan:&nbsp;</b> <a class="pull-right"><?=$config['pimpinan']?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Sekretaris:&nbsp;</b> <a class="pull-right"><?=$config['sekretaris']?></a>
                        </li>
                    </ul>
                    <div class="card-body profile-widget-description">
                        <strong><i class="fa fa-map-marker"></i>&nbsp;&nbsp; Alamat</strong>
                        <p class="text-muted"><?=$config['alamat'].".&nbsp;&nbsp;<i class='fa fa-phone'></i> ".$config['phone']?></p>
                        <div class="boxDivider"></div>
                        
                        <strong><i class="fa fa-file"></i>&nbsp;&nbsp; About</strong>
                        <p class="text-muted"><?=$config['about']?></p>
                        <div class="boxDivider"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="container">
            <div class="card card-primary col-md-12">
                <div class="card-body">
                <?php echo validation_errors() ?>
                    <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'settings/saving'?>" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="id_konfigurasi" id='id_konfigurasi' value="<?=$config['id_konfigurasi']?>" class="form-control">
                        <div class="row sectionRow">
                            <div class="col-sm-2">
                                <div>Nama Aplikasi</div>
                            </div> 
                            <div class="col-sm-8">
                                <input type="text" name="name_app" value="<?=strtoupper($config['name_app'])?>" class="form-control" required>
                                <span style="color:red;" class="name_app"><?php echo form_error('name_app')?></span>
                            </div>                  
                        </div>
                        <div class="boxDivider"></div>

                        <div class="row sectionRow">
                            <div class="col-sm-2">
                                <div>Email Kantor</div>
                            </div> 
                            <div class="col-sm-8">
                                <input type="text" name="email" value="<?=$config['email']?>" class="form-control" required>
                                <span style="color:red;" class="email"><?php echo form_error('email')?></span>
                            </div>                  
                        </div>
                        <div class="boxDivider"></div>

                        <div class="row sectionRow">
                            <div class="col-sm-2">
                                <div>Alamat</div>
                            </div> 
                            <div class="col-sm-8">
                                <input type="text" name="alamat" value="<?=$config['alamat']?>" class="form-control" required>
                                <span style="color:red;" class="alamat"><?php echo form_error('alamat')?></span>
                            </div>                  
                        </div>
                        <div class="boxDivider"></div>

                        <div class="row sectionRow">
                            <div class="col-sm-2">
                                <div>No. Telephone</div>
                            </div> 
                            <div class="col-sm-8">
                                <input type="text" name="phone" value="<?=$config['phone']?>" class="form-control" required>
                                <span style="color:red;" class="phone"><?php echo form_error('phone')?></span>
                            </div>                  
                        </div>
                        <div class="boxDivider"></div>

                        <div class="row sectionRow">
                            <div class="col-sm-2">
                                <div>Logo</div>
                            </div> 
                            <div class="card-body col-sm-7">
                                <div class="custom-file">
                                    <input type="file" id="inputFile" class="imgFile custom-file-input" name="logo" aria-describedby="inputGroupFileAddon01"/>
                                    <input type="hidden"  name="old_logo" class="form-control-file" value="<?=$config['logo']?>" />
                                    <label class="custom-file-label" for="inputFile">Choose file</label>
                                </div>&nbsp;
                                <div class="imgWrap">
                                    <?php if($config['logo'] !=''): ?>
                                        <img src="<?php echo $url.$config['logo'];?>" id="imgView" class="card-img-top img-fluid" />
                                    <?php else : ?>
                                        <img src="<?=base_url() ;?>assets/demo/brand/user.png" id="imgView" class="card-img-top img-fluid" />
                                    <?php endif ?>
                                </div>
                            </div>                  
                        </div>
                        <div class="boxDivider"></div>

                        <div class="row sectionRow">
                            <div class="col-sm-2">
                                <div>Nama Instansi</div>
                            </div> 
                            <div class="col-sm-8">
                                <input type="text" name="instansi" value="<?=$config['instansi']?>" class="form-control" required>
                                <span style="color:red;" class="instansi"><?php echo form_error('instansi')?></span>
                            </div>                  
                        </div>
                        <div class="boxDivider"></div>

                        <div class="row sectionRow">
                            <div class="col-sm-2">
                                <div>Nama Pimpinan</div>
                            </div> 
                            <div class="col-sm-8">
                                <input type="text" name="pimpinan" value="<?=$config['pimpinan']?>" class="form-control" required>
                                <span style="color:red;" class="pimpinan"><?php echo form_error('pimpinan')?></span>
                            </div>                  
                        </div>
                        <div class="boxDivider"></div>

                        <div class="row sectionRow">
                            <div class="col-sm-2">
                                <div>Nama Sekretaris</div>
                            </div> 
                            <div class="col-sm-8">
                                <input type="text" name="sekretaris" value="<?=$config['sekretaris']?>" class="form-control" required>
                                <span style="color:red;" class="sekretaris"><?php echo form_error('sekretaris')?></span>
                            </div>                  
                        </div>
                        <div class="boxDivider"></div>

                        <div class="row sectionRow">
                            <div class="col-sm-2">
                                <div>About</div>
                            </div> 
                            <div class="col-sm-8">
                                <input type="text" name="about" value="<?=$config['about']?>" class="form-control" required>
                                <span style="color:red;" class="about"><?php echo form_error('about')?></span>
                            </div>                  
                        </div>
                        <div class="boxDivider"></div>

                        <div class="row sectionRow">
                            <div class="col-sm-10"></div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-success" id="save" name="saving"><i class="fa fa-save"></i> Save</button>
                            </div>   
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>

<script>
require(['jquery'], function($) {
    //load image privew
    $("#inputFile").change(function(event) {  
    fadeInAdd();
    getURL(this);    
    });

    $("#inputFile").on('click',function(event){
    fadeInAdd();
    });

    function getURL(input) {    
    if (input.files && input.files[0]) {   
        var reader = new FileReader();
        var filename = $("#inputFile").val();
        filename = filename.substring(filename.lastIndexOf('\\')+1);
        reader.onload = function(e) {
        debugger;      
        $('#imgView').attr('src', e.target.result);
        $('#imgView').hide();
        $('#imgView').fadeIn(500);      
        $('.custom-file-label').text(filename);             
        }
        reader.readAsDataURL(input.files[0]);    
    }
    $(".alert").removeClass("loadAnimate").hide();
    }

    function fadeInAdd(){
    fadeInAlert();  
    }
    function fadeInAlert(text){
    $(".alert").text(text).addClass("loadAnimate");  
    }
});

</script>