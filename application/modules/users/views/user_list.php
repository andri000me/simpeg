<div class="container">
    <div class="row">
        <div class="col-12">
        <?=$this->session->flashdata('message')?'<div class="alert alert-danger" role="alert"><strong>Failed : </strong>'.$this->session->flashdata('message'):''?>
        <?=$this->session->flashdata('message2')?'<div class="alert alert-success" role="alert"><strong>Success : </strong>'.$this->session->flashdata('message2'):''?>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?=$c_judul?></h3>
                    <div class="card-options">
                        <a href="<?php echo base_url('users/create') ?>" class="btn btn-primary">Create</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table card-table text-nowrap datatable ">
                        <thead>
                            <tr>
                                <th class="w-1">No.</th>
                                <th>Photo</th>
                                <th>Display Name</th>
                                <th>Role</th>
                                <th>Email</th>     
                                <th>NIP</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $i = 1;
                        foreach($users as $user) : ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td>
                                <?php if($user->images != 'user.png') { ?>  
                                    <img class="rounded-circle" width="40" height="40" src="<?php echo base_url("assets/media/" . formatFolderUser($user->user_id)."/profile/".$user->images);?>">
                                <?php } else { ?>
                                    <img class="rounded-circle" width="40" height="40" src="<?php echo base_url().'assets/demo/brand/user.png';?>">
                                <?php } ?>
                                </td>
                                <td><?=$user->full_name?></td>
                                <td><?=$user->role_name?></td>
                                <td><?=$user->email?></td>
                                <td><?=$user->nip?></td>
                                <td style="vertical-align:middle">
                                <?php if ($user->user_id !== '1') { ?>
                                    <?php if($user->banned == 0) { ?>
                                        <a href="<?=base_url();?>users/banned/1/<?=$user->user_id;?>" class="btn btn-success btn-sm"data-toggle="tooltip" title="Non-aktifkan?" onclick="return confirm('Apakah kamu yakin akan menonaktifkan akun ini?');">Aktif</a>
                                    <?php } else { ?>
                                        <a href="<?=base_url();?>users/banned/0/<?=$user->user_id;?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin akan mengaktifkan akun ini kembali?');">Non Aktif</a>
                                    <?php }?>
                                <?php } ?>
                                </td>
                                <td style="vertical-align:middle">
                                <?php if ($user->user_id !== '1') { ?>
                                    <a class="btn btn-warning btn-sm" href="<?php echo base_url().'users/reset_pass/'.$user->user_id;?>" onclick="return confirm('Apakah kamu yakin akan mereset password akun ini?');" data-toggle="tooltip" title="Reset Password"><span class="fa fa-refresh"></span></a>&nbsp;
                                    
                                    <a href="<?php echo base_url().'users/create/'.$user->user_id;?>" class="btn btn-primary mr-1 btn-sm" data-toggle="tooltip" data-html="true" title="Edit"><span class="fa fa-edit"></span></a>
                                    <a style="color:white;" class="btn btn-danger mr-1 btn-sm" data-toggle="modal" data-target="#ModalHapus<?=$user->user_id;?>" data-toggle="tooltip" title="Hapus"><span class="fe fe-trash"></span></a>
                                <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach($users as $user) : ?>
<div class="modal fade" id="ModalHapus<?=$user->user_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Hapus User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="form-horizontal" action="<?=base_url().'users/delete'?>" method="post" enctype="multipart/form-data">
          <!--modal body-->
          <div class="modal-body">
            <input type="hidden" name="user_id" value="<?=$user->user_id;?>"/>
             <p>Apakah Anda yakin mau menghapus Pengguna:&nbsp;<b><?=$user->full_name;?></b> ?</p>
          </div>
          <!-- end modal body-->
          <div class="modal-footer">
          <button type="button" class="btn btn-default btn-md" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary btn-md" id="simpan"><i class="fe fe-trash"></i> Hapus</button>
        </div>
      </form>
      </div>
    </div>
</div>
<?php endforeach; ?>

<!-- modal reset -->
<div class="modal fade" id="ModalResetPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Reset Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
          <!--modal body-->
          <div class="modal-body">
            <table>
                <tr>
                    <th style="width:120px;">Username</th>
                    <th>:</th>
                    <th><?php echo $this->session->flashdata('uname');?></th>
                </tr>
                <tr>
                    <th style="width:120px;">Password Baru</th>
                    <th>:</th>
                    <th><?php echo $this->session->flashdata('upass');?></th>
                </tr>
            </table>
          </div>
          <!-- end modal body-->
          <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

<script>
require(['datatables','notify', 'jquery'], function(datatable,notify, $) {
        $('.datatable').DataTable();

    <?php if($this->session->flashdata('message3') === 'show-modal') :?>
        $('#ModalResetPassword').modal('show');
    <?php endif; ?>
});
</script>
