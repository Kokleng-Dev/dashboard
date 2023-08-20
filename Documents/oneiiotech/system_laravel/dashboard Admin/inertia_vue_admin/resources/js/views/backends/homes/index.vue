<template>
    <Head>
        <title>{{ __('Dashboard') }}</title>
    </Head>
    <div class="card">
        <div class="card-body">
            <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>
            <div class="row">
                <div class="col-xl-6 col-xxl-5 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Sales</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="truck"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3">2.382</h1>
                                        <div class="mb-0">
                                            <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i>
                                                -3.65% </span>
                                            <span class="text-muted">Since last week</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Visitors</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="users"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3">14.212</h1>
                                        <div class="mb-0">
                                            <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i>
                                                5.25% </span>
                                            <span class="text-muted">Since last week</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Earnings</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="dollar-sign"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3">$21.300</h1>
                                        <div class="mb-0">
                                            <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i>
                                                6.65% </span>
                                            <span class="text-muted">Since last week</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Orders</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="shopping-cart"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3">64</h1>
                                        <div class="mb-0">
                                            <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i>
                                                -2.25% </span>
                                            <span class="text-muted">Since last week</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <button class="btn btn-danger mb-3" @click="sweetAlert2('Hi, Sweet Alert')">
                        <i class="fa fa-bell"></i> Alert {{ __('Home') }}
                    </button>
                    <form action="" method="POST" class="formCreate" novalidate>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="daterange" required>
                            <button class="btn btn-primary">Click</button>
                        </div>
                        <input type="text" class="form-control mb-3" required>
                        <select name="" id="" class="form-control select2 mb-5" required>
                            <option value="">Select</option>
                            <option value="">1</option>
                            <option value="">2</option>
                        </select>
                        <br>
                        <br>
                        <br>

                        <textarea name="" class="summernote" id="" cols="30" rows="10" required></textarea>
                        <button class="btn btn-primary mt-3 float-end">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            count: 0
        }
    },
    methods : {

    },
    mounted(){
        $('input[name="daterange"]').daterangepicker({
            opens: 'left',
            timePicker: true,
            startDate: moment("00:00", "hh:mm"),
            endDate: moment("23:59", "hh:mm"),
            autoUpdateInput: true,
            locale: {
                format: 'DD/MM/YY hh:mm A'
            }
        }, function(start, end, label) {
            
        });




        


    }
}
</script>