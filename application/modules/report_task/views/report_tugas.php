<div class="container">
    <div class="row">
        <div class="col-12">
        <?=$this->session->flashdata('message')?'<div class="alert alert-danger" role="alert"><strong>Failed : </strong>'.$this->session->flashdata('message'):''?>
        <?=$this->session->flashdata('message2')?'<div class="alert alert-success" role="alert"><strong>Success : </strong>'.$this->session->flashdata('message2'):''?>
        </div>
    </div>
</div>

<div class="my-3 my-md-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?=$c_judul?></h3>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table card-table text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th width="2%">No</th>
                                        <th width="10%">Jabatan</th>
                                        <th width="10%">Departemen</th>
                                        <th width="10%">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>