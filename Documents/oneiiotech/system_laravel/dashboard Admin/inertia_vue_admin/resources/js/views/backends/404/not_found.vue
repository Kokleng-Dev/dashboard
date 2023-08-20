<template>
<Head>
    <title>{{ __('404') }}</title>
</Head>
  <div class="vw-100 vh-100 d-flex justify-content-center align-items-center">
    <div class="card w-50">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 col-12 d-flex justify-content-center align-items-center">
                    <h1 class="text-warning text-center d-block m-0" style="font-size: 100px">
                        <i class="bi bi-exclamation-triangle"></i>
                    </h1>
                </div>
                <div class="col-12 col-lg-8">
                    <h1 class="text-warning">Opps! <small>404 Not Found Page.</small></h1>
                    <h2>You are accessing the wrong path.</h2>
                    <br>
                    <p>Please contact to your administration.</p>
                    <Link :href="$route('admin.home')">Go to Home Page</Link>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
import blank from '@/components/backends/layouts/blank.vue'

export default {
    layout : blank,
}
</script>

<style>

</style>