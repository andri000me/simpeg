<div class="my-3 my-md-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?=$c_judul?></h3>
                        <div class="card-options">
                            <a href="<?php echo base_url('userlevel') ?>" class="btn btn-primary"><i class="fe fe-list"></i> Manage Level User</a>
                        </div>
                    </div>
                    <div class="card-body" style="padding-bottom:0rem">
                        <form class="form-horizontal" id="formRole" method="post">
                            <input type="hidden" name="role_id" id='role_id' value="<?=$formdata['role_id']?>" class="form-control">
                            <div class="row sectionRow">
                                <div class="col-sm-2">
                                    <div>Nama Role</div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="role_name" value="<?=$formdata['role_name']?>" class="form-control" required>
                                    <span style="color:red;" class="role_name"></span>
                                </div>
                            </div>
                            <div class="boxDivider"></div>

                            <div class="row sectionRow">
                                <div class="col-sm-2">
                                    <div>Deskripsi Role</div>
                                </div>
                                <div class="col-sm-4">
                                    <textarea name="description" id="description" cols="50" rows="5"><?=$formdata['description']?></textarea>
                                    <span style="color:red;" class="description"></span>
                                </div>
                            </div>
                            <div class="boxDivider"></div>

                            <div class="row sectionRow">
                                <div class="col-sm-10"></div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-success" id="saveRole" name="save"><i class="fa fa-save"></i> Save</button>
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
        var formData = $('#formRole').serializeObject();
        formData['save'] = 1;

        $.ajax({
            url: "<?= site_url('userlevel/saving')?>",
            type: "post",
            dataType: "json",
            data: formData,
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
        
        }).fail(function(){
            $("button[name='save']").removeClass('btn-loading');
            alertError("Error saving data. Try again!");
        });
        return false;   
    })
});
</script>