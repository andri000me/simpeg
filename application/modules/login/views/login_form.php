<div class="row">
    <div class="col col-login mx-auto">
        <form action="<?php echo base_url('login/auth') ?>" class="card" method="post">
        
        <?=$this->session->flashdata('message2')?'<div class="alert alert-danger" role="alert"><strong>Failed : </strong>'.$this->session->flashdata('message2')['message2']:''?>
            <div class="card-body p-6">
            <p>Sign in to start your session</p>
                <div class="form-group">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">
                                <i class="fa fa-eye" id="show" style="cursor: pointer"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-footer">
                    <button type="submit" name="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in"></i> Sign in</button>
                </div>
            </div>
        </form>
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
});
</script>