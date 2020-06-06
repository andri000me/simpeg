<div class="container">
    <div class="row row-deck">
        <div class="col-sm-6 col-lg-4">
            <div class="card p-4">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-green mr-3">
                        <i class="fe fe-shopping-cart"></i>
                    </span>
                    <div>
                        <h4 class="m-0"><a href="">11 <small>Orders Today</small></a></h4>
                        <small class="text-muted">5 confirmed</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card p-4">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-red mr-3">
                        <i class="fe fe-users"></i>
                    </span>
                    <div>
                        <h4 class="m-0"><a href="">11 <small>Users</small></a></h4>
                        <small class="text-muted">4 Registered today</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card p-4">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-yellow mr-3">
                        <i class="fe fe-user"></i>
                    </span>
                    <div>
                        <h4 class="m-0"><a href="">11 <small>Login Today</small></a></h4>
                        <small class="text-muted">5 confirmed</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    require(['datatables', 'jquery'], function(datatable, $) {
        $('.datatable').DataTable();
        });
</script>