<div class="my-3 my-md-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?=$c_judul?></h3>
                        <div class="card-options">
                            <a href="<?php echo base_url('skp') ?>" class="btn btn-primary"><i class="fe fe-list"></i> Manage SKP List</a>
                        </div>
                    </div>
                    <div class="card-body" style="padding-bottom:0rem">
                        <form class="form-horizontal" id="formSKP" method="post">
                            <input type="hidden" name="skp_id" value="<?=$formdata['skp_id']?>" class="form-control">
                            <div class="row sectionRow">
                                <div class="col-sm-2">
                                    <div>Kegiatan</div>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="kegiatan" value="<?=$formdata['kegiatan']?>" class="form-control" required>
                                    <span style="color:red;" class="kegiatan"></span>
                                </div>
                            </div>
                            <div class="boxDivider"></div>

                            <div class="row sectionRow">
                                <div class="col-sm-2">
                                    <div>Kuantitas (Output)</div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="kuantitas" value="<?=$formdata['kuantitas']?>" class="form-control" required>
                                    <span style="color:red;" class="kuantitas"></span>
                                </div>
                            </div>
                            <div class="boxDivider"></div>

                            <div class="row sectionRow">
                                <div class="col-sm-2">
                                    <div>Satuan</div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="satuan" value="<?=$formdata['satuan']?>" class="form-control" required>
                                    <span style="color:red;" class="satuan"></span>
                                </div>
                            </div>
                            <div class="boxDivider"></div>

                            <div class="row sectionRow">
                                <div class="col-sm-2">
                                    <div>Kualitas (mutu)</div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="kualitas" value="<?=$formdata['kualitas']?>" class="form-control" required>
                                    <span style="color:red;" class="kualitas"></span>
                                </div>
                            </div>
                            <div class="boxDivider"></div>

                            <div class="row sectionRow">
                                <div class="col-sm-2">
                                    <div>Durasi</div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group mb-3">
                                    <input type="number" class="form-control" id="waktu" name="waktu" value="<?=$formdata['waktu']?>" aria-label="Waktu" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">
                                                hari
                                            </span>
                                        </div>
                                    </div>
                                    <span style="color:red;" class="waktu"></span>
                                </div>
                            </div>
                            <div class="boxDivider"></div>

                            <div class="row sectionRow">
                                <div class="col-sm-2">
                                    <div>Bulan</div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="bulan" value="<?=$formdata['bulan']?>" class="form-control" required>
                                    <span style="color:red;" class="bulan"></span>
                                </div>
                            </div>
                            <div class="boxDivider"></div>

                            <div class="row sectionRow">
                                <div class="col-sm-10"></div>
                                <div class="col-sm-2">
                                <?php if(empty($this->uri->segment(3))) { ?>
                                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Clear</button>  
                                    <button type="submit" class="btn btn-success" name="save"><i class="fa fa-save"></i> Save</button>
                                <?php }else{ ?>
                                    <button type="submit" class="btn btn-success" name="save"><i class="fa fa-save"></i> Save</button>
                                <?php } ?>
                                    
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
        var formData = $('#formSKP').serializeObject();
        formData['save'] = 1;

        $.ajax({
            url: "<?php echo site_url('skp/saving') ?>",
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