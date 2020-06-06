<div class="my-3 my-md-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?=$c_judul?></h3>
                        <div class="card-options">
                            <a href="<?php echo base_url('menu') ?>" class="btn btn-primary"><i class="fe fe-list"></i> Manage Menu</a>
                        </div>
                    </div>
                    <div class="card-body" style="padding-bottom:0rem">
                        
                        <form class="form-horizontal" id="formMenu" method="post">
                            <input type="hidden" name="menu_id" id='menu_id' value="<?=$formdata['menu_id']?>" class="form-control">

                            <div class="row sectionRow">
                                <div class="col-sm-2">
                                    <div>Nama Menu</div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="title" value="<?=$formdata['title']?>" class="form-control" required>
                                    <span style="color:red;" class="title"></span>
                                </div>
                            </div>
                            <div class="boxDivider"></div>

                            <div class="row sectionRow">
                                <div class="col-sm-2">
                                    <div>ALamat Url</div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="url" value="<?=$formdata['url']?>" class="form-control" required>
                                    <span style="color:red;" class="url"></span>
                                </div>
                            </div>
                            <div class="boxDivider"></div>

                            <div class="row sectionRow">
                                <div class="col-sm-2">
                                    <div>Icon</div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="icon" value="<?=$formdata['icon']?>" class="form-control" required>
                                    <span style="color:red;" class="icon"></span>
                                </div>
                            </div>
                            <div class="boxDivider"></div>

                            <div class="row sectionRow">
                                <div class="col-sm-2">
                                    <div>Sub Menu</div>
                                </div>
                                <div class="col-sm-4">
                                    <?php echo dropdown_dinamis('is_main_menu', 'tb_menu', 'title', 'menu_id', $formdata['is_main_menu'], 'DESC') ?>
                                    <span style="color:red;" class="is_main_menu"></span>
                                </div>
                            </div>
                            <div class="boxDivider"></div>

                            <div class="row sectionRow">
                                <div class="col-sm-2">
                                    <div>Ditampilkan</div>
                                </div>
                                <div class="col-sm-4">
                                <?php echo form_dropdown('is_aktif',array("1" => "Yes", "0" => "No"),$formdata['is_aktif'], 'class="form-control"');?>
                                <span style="color:red;" class="is_aktif"></span>
                                </div>
                            </div>
                            
                            <div class="boxDivider"></div>
                            <div class="row sectionRow">
                                <div class="col-sm-10"></div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-success" id="saveMenu" name="save"><i class="fa fa-save"></i> Save</button>
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
        var formData = $('#formMenu').serializeObject();
        formData['save'] = 1;

        $.ajax({
            url: "<?php echo site_url('menu/saving') ?>",
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