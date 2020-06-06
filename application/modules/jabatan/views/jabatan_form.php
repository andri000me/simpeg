<div class="my-3 my-md-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?=$c_judul?></h3>
                        <div class="card-options">
                            <a href="<?php echo base_url('jabatan') ?>" class="btn btn-primary"><i class="fe fe-list"></i> Manage Jabatan List</a>
                        </div>
                    </div>
                    <div class="card-body" style="padding-bottom:0rem">
                        <form class="form-horizontal" id="formJabatan" method="post">
                            <input type="hidden" name="id_jabatan" value="<?=$formdata['id_jabatan']?>" class="form-control">
                            <div class="row sectionRow">
                                <div class="col-sm-2">
                                    <div>Nama Jabatan</div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="jabatan_name" value="<?=$formdata['jabatan_name']?>" class="form-control" required>
                                    <span style="color:red;" class="jabatan_name"></span>
                                </div>
                            </div>
                            <div class="boxDivider"></div>
                            
                            <div class="row sectionRow">
                                <div class="col-sm-2">
                                    <div>Departemen</div>
                                </div>
                                <div class="col-sm-4">
                                    <?php echo dropdown_dinamis('id_departemen', 'tb_departemen', 'departemen_name', 'id_departemen',$formdata['id_departemen'],'DESC') ?>
                                    <span style="color:red;" class="id_departemen"></span>
                                </div>
                            </div>
                            <div class="boxDivider"></div>
                            <div class="row sectionRow">
                                <div class="col-sm-10"></div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-success" name="save"><i class="fa fa-save"></i> Save</button>
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
        var formData = $('#formJabatan').serializeObject();
        formData['save'] = 1;

        $.ajax({
            url: "<?php echo site_url('jabatan/saving') ?>",
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