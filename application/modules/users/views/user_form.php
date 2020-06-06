<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?=$c_judul?></h3>
            <div class="card-options">
                <a href="<?php echo base_url('users') ?>" class="btn btn-primary"><i class="fe fe-list"></i> Manage Users</a>
            </div>
          </div>
          <div class="card-body" style="padding-bottom:0rem">

                <form class="form-horizontal" id="formUsers" method="post">
                    <input type="hidden" name="user_id" id='user_id' value="<?=$formdata['user_id']?>" class="form-control">
                    <div class="row sectionRow">
                        <div class="col-sm-2">
                            <div>Role</div>
                        </div> 
                        <div class="col-sm-4">
                            <?php echo dropdown_dinamis('role_id', 'tb_roles', 'role_name', 'role_id',$formdata['role_id'],'DESC') ?>
                        </div>                  
                    </div>
                    <div class="boxDivider"></div>
                    <div class="row sectionRow">
                        <div class="col-sm-2">
                            <div>NIP</div>
                        </div> 
                        <div class="col-sm-4">
                            <input type="text" name="nip" value="<?=$formdata['nip']?>" class="form-control" required>
                            <span style="color:red;" class="nip"></span>
                        </div>
                                          
                    </div>
                    <div class="boxDivider"></div>
                    <div class="row sectionRow">
                        <div class="col-sm-2">
                            <div>Full Name</div>
                        </div> 
                        <div class="col-sm-3">
                            <input type="text" name="fullname" value="<?=$formdata['fullname']?>" class="form-control" required>
                            <span style="color:red;" class="fullname"></span>
                        </div>                   
                    </div>
                    <div class="boxDivider"></div>
                    <div class="row sectionRow">
                        <div class="col-sm-2">
                            <div>Tanggal Lahir</div>
                        </div> 
                        <div class="col-sm-4">
                            <input type="date" name="born_date" value="<?=$formdata['born_date']?>" class="form-control" required>
                            <span style="color:red;" class="born_date"></span>
                        </div>                  
                    </div>
                    <div class="boxDivider"></div>
                    <div class="row sectionRow">
                        <div class="col-sm-2">
                            <div>Email</div>
                        </div> 
                        <div class="col-sm-4">
                            <input type="email" name="email" id="email" value="<?=$formdata['email']?>" class="form-control" required>
                            <span style="color:red;" class="email"></span>
                        </div>                  
                    </div>
                    <div class="boxDivider"></div>

                    <div class="row sectionRow">
                        <div class="col-sm-2">
                            <div>Jabatan</div>
                        </div> 
                        <div class="col-sm-4">
                            <select class="form-control" name="id_jabatan" id="id_jabatan">
                                <option value="">--Please Select--</option>
                                <?php
                                foreach ($jabatan as $j):
                                    ?>
                                    <option <?php echo $formdata['id_jabatan'] == $j->id_jabatan ? 'selected="selected"': ''?> value="<?php echo $j->id_jabatan?>"><?php echo $j->jabatan_name.' '.$j->departemen_name?></option>
                                <?php endforeach; ?>

                            </select>
                            <span style="color:red;" class="email"></span>
                        </div>                  
                    </div>
                    <div class="boxDivider"></div>

                    <div class="row sectionRow">
                        <div class="col-sm-2">
                            <div>Password</div>
                        </div> 
                        <div class="col-sm-4">
                            <span style="color:red;">Password otomatis sesuai dengan tanggal lahir. <br>contoh "02041999"</span>
                        </div>                  
                    </div>
                    <div class="boxDivider"></div>

                    <div class="row sectionRow">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">
                        <?php if(empty($this->uri->segment(3))) :?>
                            <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> clear</button>
                            <button type="submit" class="btn btn-success" id="saveUser" name="save"><i class="fa fa-save"></i> Save</button>
                        <?php else : ?>
                            <button type="submit" class="btn btn-success" id="saveUser" name="save"><i class="fa fa-save"></i> Save</button>
                        <?php endif ?> 
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
    require(['notify', 'jquery'], function(notify, $) {
        $.fn.serializeObject = function(){
            var self = this,
                json = {},
                push_counters = {},
                patterns = {
                    "validate": /^[a-zA-Z][a-zA-Z0-9_]*(?:\[(?:\d*|[a-zA-Z0-9_]+)\])*$/,
                    "key":      /[a-zA-Z0-9_]+|(?=\[\])/g,
                    "push":     /^$/,
                    "fixed":    /^\d+$/,
                    "named":    /^[a-zA-Z0-9_]+$/
                };


            this.build = function(base, key, value){
                base[key] = value;
                return base;
            };

            this.push_counter = function(key){
                if(push_counters[key] === undefined){
                    push_counters[key] = 0;
                }
                return push_counters[key]++;
            };

            $.each($(this).serializeArray(), function(){

                // skip invalid keys
                if(!patterns.validate.test(this.name)){
                    return;
                }

                var k,
                    keys = this.name.match(patterns.key),
                    merge = this.value,
                    reverse_key = this.name;

                while((k = keys.pop()) !== undefined){

                    // adjust reverse_key
                    reverse_key = reverse_key.replace(new RegExp("\\[" + k + "\\]$"), '');

                    // push
                    if(k.match(patterns.push)){
                        merge = self.build([], self.push_counter(reverse_key), merge);
                    }

                    // fixed
                    else if(k.match(patterns.fixed)){
                        merge = self.build([], k, merge);
                    }

                    // named
                    else if(k.match(patterns.named)){
                        merge = self.build({}, k, merge);
                    }
                }

                json = $.extend(true, json, merge);
            });

            return json;
        };

        $(document).on("click", "button[name='save']", function(){
            var formData = $('#formUsers').serializeObject();
            formData['save'] = 1;

            $.ajax({
                url: "<?php echo site_url('users/saving') ?>",
                type: "post",
                dataType: "json",
                data:formData,
                beforeSend: function() {
                    $("button[name='save']").addClass('btn-loading');
                }
            }).done(function(response){
                $("button[name='save']").removeClass('btn-loading');
                if( typeof response.error != 'undefined'){
					$.each(response.error, function(className, errorMessage){
						$('.'+className).html(errorMessage);
					});
				}

                if(response.status == 1){
					alertSuccess(response.message);
				}else{
					alertError(response.message);
				}

            }).fail(function(response){
                $("button[name='save']").removeClass('btn-loading');
                alertError("Error saving data. Try again!");
            });
            return false;
        });
});
</script>