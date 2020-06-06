<div class="container">
    <div class="row align-items-center">
        <div class="col-lg order-lg-first">
            <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                <li class="nav-item">
                    <a href="<?php echo site_url('dashboard');?>" class="nav-link"><i class="fe fe-home"></i> Dashboard</a>
                </li>
                <?php
                    $setting = $this->db->get_where('tb_setting', array('setting_id' => 1))->row_array();
                    if ( $setting['value'] == 1 ) {
                        $role_id = $this->session->userdata('role_id');
                        $sql_menu = "SELECT *
                                FROM tb_menu
                                WHERE menu_id in(SELECT menu_id FROM tb_role_permission WHERE role_id = $role_id) AND is_main_menu = 0 AND is_active =1";
                    }
                    else{
                        $sql_menu = "SELECT * FROM tb_menu WHERE is_active = 1 AND is_main_menu = 0";
                    }

                    $main_menu = $this->db->query($sql_menu)->result();
                    foreach ( $main_menu as $menu ) {
                        $this->db->where('is_main_menu', $menu->menu_id);
                        $this->db->where('is_active', 1);
                        $submenu = $this->db->get('tb_menu');

                        if( $submenu->num_rows() > 0){
                            #shown menu
                            echo "<li class='nav-item dropdown'>
                                    <a href='javascript:void(0)' class='nav-link' data-toggle='dropdown'>
                                        <i class='$menu->icon'></i> &nbsp;".$menu->title."</a>
                                    <div class='dropdown-menu dropdown-menu-arrow'>";
                                foreach ($submenu->result() as $sub) {
                                    echo "<a href='".base_url($sub->url)."' class='dropdown-item'><i class='fa fa-circle-o'></i>".$sub->title."</a>";
                                }
                            echo "</div>
                                </li>";
                        }else{
                            echo "<li class='nav-item'>";
                            echo "<a href='".base_url($menu->url)."' class='nav-link'><i class='$menu->icon'></i> &nbsp;".$menu->title." </a>";
                            echo "</li>";
                        }
                    }
                ?>                
            </ul>
        </div>
    </div>
</div>