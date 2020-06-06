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
                        <?php if($formdata['fotoprofil'] != 'user.png'): ?>
                        <img alt="image" class="profile-widget-picture rounded-circle" src="<?php echo $url.$formdata['fotoprofil'];?>">
                        <?php else : ?>
                        <img alt="image" class="profile-widget-picture rounded-circle" src="<?php echo base_url('assets/demo/brand/user.png');?>">
                        <?php endif ?>
                        <h3 class="text-center"><?php echo $this->session->userdata('display_name'); ?></h3>
                        <br>
                        <p class="text-muted text-center"><?=$formdata['jabatan']?></p>
                    </div>
                </div>
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Login terakhir:&nbsp;</b> <a class="pull-right"><?=$formdata['last_login']?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Status Pengguna:&nbsp;</b> <a class="pull-right">haha</a>
                    </li>
                    <li class="list-group-item">
                        <b>Tanggal Terdaftar:&nbsp;</b> <a class="pull-right"><?=$formdata['create_at']?></a>
                    </li>
                </ul>
                <div class="card-body profile-widget-description">
                    <strong><i class="fa fa-user"></i>&nbsp;&nbsp; NIP</strong>
                    <p><?=$formdata['nip']?></p>
                    <div class="boxDivider"></div>

                    <strong><i class="fa fa-phone"></i>&nbsp;&nbsp; No. Telephone</strong>
                    <p><?=$formdata['phone']?></p>
                    <div class="boxDivider"></div>

                    <strong><i class="fa fa-map-marker"></i>&nbsp;&nbsp; Alamat</strong>
                    <p><?=$formdata['address']?></p>
                    <div class="boxDivider"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="container">
            <div class="card card-primary col-md-12">
                <div class="card-body">
                    <ul class="nav nav-pills" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="profil-tab" data-toggle="tab" href="#profil" role="tab" aria-controls="home" aria-selected="true">Setting Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="akun-tab" data-toggle="tab" href="#akun" role="tab" aria-controls="profile" aria-selected="false">Setting Akun</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profil" role="tabpanel" aria-labelledby="home-tab3">
                        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'profile/updateProfile'?>" enctype="multipart/form-data" method="post">
                                <input type="hidden" name="user_id" id='user_id' value="<?=$formdata['user_id']?>" class="form-control">
                                <div class="row sectionRow">
                                    <div class="col-sm-2">
                                        <div>NIP</div>
                                    </div> 
                                    <div class="col-sm-4">
                                        <input type="text" name="nip" value="<?=$formdata['nip']?>" class="form-control" required>
                                        <span style="color:red;" class="nip"><?php echo form_error('nip')?></span>
                                    </div>

                                    <div class="col-sm-2">
                                        <div>NIK</div>
                                    </div> 
                                    <div class="col-sm-4">
                                        <input type="number" name="nik" value="<?=$formdata['nik']?>" class="form-control" required>
                                        <span style="color:red;" class="nik"><?php echo form_error('nik')?></span>
                                    </div>               
                                </div>
                                <div class="boxDivider"></div>
                                <div class="row sectionRow">
                                    <div class="col-sm-2">
                                        <div>Full Name</div>
                                    </div> 
                                    <div class="col-sm-8">
                                        <input type="text" name="full_name" value="<?=$formdata['full_name']?>" class="form-control" required>
                                        <span style="color:red;" class="full_name"><?php echo form_error('full_name')?></span>
                                    </div>                  
                                </div>
                                <div class="boxDivider"></div>
                                <div class="row sectionRow">
                                    <div class="col-sm-2">
                                        <div>Tanggal Lahir</div>
                                    </div> 
                                    <div class="col-sm-4">
                                        <input type="date" name="born_date" value="<?=$formdata['born_date']?>" class="form-control" required>
                                        <span style="color:red;" class="born_date"><?php echo form_error('born_date')?></span>
                                    </div>                  
                                </div>
                                <div class="boxDivider"></div>
    
                                <div class="row sectionRow">
                                    <div class="col-sm-2">
                                        <div>No. Telephone</div>
                                    </div> 
                                    <div class="col-sm-4">
                                        <input type="number" name="phone" id="phone" value="<?=$formdata['phone']?>" class="form-control" required>
                                        <span style="color:red;" class="phone"><?php echo form_error('phone')?></span>
                                    </div>

                                    <div class="col-sm-2">
                                        <div>Jenis Kelamin</div>
                                    </div> 
                                    <div class="col-sm-4">
                                        <select name="gender" class="form-control" id="gender" value="<?=$formdata['gender']?>">
                                            <option disabled selected>Pilih Jenis Kelamin</option>
                                            <option value="L"<?php if($formdata['gender'] == 'L') { echo "selected";}?>>Laki-Laki</option>
                                            <option value="P"<?php if($formdata['gender'] == 'P') { echo "selected";}?>>Perempuan</option>
                                        </select>
                                        <span style="color:red;" class="gender"><?php echo form_error('gender')?></span>
                                    </div>                   
                                </div>
                                <div class="boxDivider"></div>
                                <div class="row sectionRow">
                                    <div class="col-sm-2">
                                        <div>Photo Profile</div>
                                    </div>
                                    <div class="card-body col-sm-4">
                                        <div class="custom-file">
                                            <input type="file" id="inputFile" class="imgFile custom-file-input" name="fotoprofil" aria-describedby="inputGroupFileAddon01"/>
                                            <input type="hidden"  name="old_images" class="form-control-file" value="<?=$formdata['fotoprofil']?>" />
                                            <label class="custom-file-label" for="inputFile">Choose file</label>
                                        </div>&nbsp;
                                        <div class="imgWrap">
                                            <?php if($formdata['fotoprofil'] != 'user.png'): ?>
                                                <img src="<?php echo $url.$formdata['fotoprofil'];?>" id="imgView" class="card-img-top img-fluid" />
                                            <?php else: ?>
                                                <img src="<?=base_url() ;?>assets/demo/brand/user.png" id="imgView" class="card-img-top img-fluid" />
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="boxDivider"></div>

                                <div class="row sectionRow">
                                    <div class="col-sm-2">
                                        <div>Alamat</div>
                                    </div> 
                                    <div class="col-sm-10">
                                    <input type="text" name="address" id="address" value="<?=$formdata['address']?>" class="form-control" required>
                                        <span style="color:red;" class="address"><?php echo form_error('address')?></span>
                                    </div>                  
                                </div>
                                <div class="boxDivider"></div>

                                <div class="row sectionRow">
                                    <div class="col-sm-10"></div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-success" id="saveProfile" name="saveProfile"><i class="fa fa-save"></i> Save</button>
                                    </div>   
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="akun" role="tabpanel" aria-labelledby="profile-tab3">
                        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'profile/changePassword'?>" enctype="multipart/form-data" method="post">
                                <input type="hidden" name="user_id" id='user_id' value="" class="form-control">
                                <div id="email" style="display: block">
                                    <div class="row sectionRow">
                                        <div class="col-sm-2">
                                            <div>Email</div>
                                        </div> 
                                        <div class="col-sm-6">
                                            <input type="email" name="email" id="email" value="<?=$formdata['email']?>" class="form-control" required>
                                            <span style="color:red;" class="email"><?php echo form_error('email')?></span>
                                        </div>                  
                                    </div>
                                </div>
                                <div class="boxDivider"></div>
                                <br>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="myCheck" name="checkbox" class="custom-control-input" tabindex="3" onclick="gantipass()">
                                        <label class="custom-control-label" for="myCheck">Klik Untuk Ganti Password</label>
                                    </div>
                                </div>
                                <div id="shown" style="display: none">
                                    <div class="row sectionRow">
                                        <div class="col-sm-2">
                                            <div>Password</div>
                                        </div> 
                                        <div class="col-sm-6">
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">
                                                        <i class="fa fa-eye" id="show" style="cursor: pointer"></i>
                                                    </span>
                                                </div>
                                            </div>

                                        </div>                  
                                    </div>
                                    <div class="boxDivider"></div>  
                                </div>

                                <div class="boxDivider"></div>
                                <div class="row sectionRow">
                                    <div class="col-sm-10"></div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-success" id="savePass" name="updatePass"><i class="fa fa-save"></i> Save</button>
                                    </div>   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
require(['jquery'], function($) {
    $('#show').on('click', function(){
        var myClass = $(this).attr("class");
        if (myClass == 'fa fa-eye') {
            $('#show').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            $('#password').attr('type', 'text');
        }
        else {
            $('#show').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            $('#password').attr('type', 'password');
        }
    });

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

function gantipass() {
	var checkBox = document.getElementById("myCheck");
	var pass = document.getElementById("shown");
    var email = document.getElementById("email");
    if (checkBox.checked == true) {
        pass.style.display ="block";
        email.style.display ="none";
        
    }else{
        pass.style.display ="none";
        email.style.display ="block";   
    }
}
</script>

