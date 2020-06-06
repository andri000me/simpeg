<div class="container">
    <div class="d-flex">
        <a class="header-brand" href="<?php echo site_url('dashboard');?>">
            <!-- <img src="<?php echo base_url();?>assets/demo/brand/tabler@2x.png" class="header-brand-img" alt="tabler logo"> -->
        <label for="" style="color:white;">SIMPEG</label>
        </a>
        <div class="d-flex order-lg-2 ml-auto">
            <div class="dropdown">
                <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <?php if($this->session->userdata('images') != 'user.png') : ?>
                    <span class="avatar" style="background-image: url(<?php echo base_url("assets/media/" . formatFolderUser($this->session->userdata('user_id'))."/profile/".$this->session->userdata('images'));?>)"></span>
                    <?php else : ?>
                    <span class="avatar" style="background-image: url(<?php echo base_url('assets/demo/brand/user.png')?>)"></span>
                    <?php endif ?>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default" style="color: white !important;"><?php echo $this->session->userdata('display_name')?></span>
                      <small class="text-muted d-block mt-1" style="color: white !important;"><?php echo $this->session->userdata('role_name')?></small>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="<?php echo site_url('profile');?>">
                      <i class="dropdown-icon fa fa-home"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>

                    <?php if($this->session->userdata['role_id'] === '1') { ?>
                      <a class="dropdown-item" href="<?php echo site_url('settings');?>">
                        <i class="dropdown-icon fa fa-gear"></i> Setting
                      </a>
                    <div class="dropdown-divider"></div>
                    <?php }?>
                    

                    <a class="dropdown-item" href="<?php echo site_url('login/logout');?>">
                      <i class="dropdown-icon fa fa-sign-out"></i> Sign out
                    </a>
                </div>
            </div>
        </div>
        <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
            <span class="header-toggler-icon"></span>
        </a>
    </div>

</div>