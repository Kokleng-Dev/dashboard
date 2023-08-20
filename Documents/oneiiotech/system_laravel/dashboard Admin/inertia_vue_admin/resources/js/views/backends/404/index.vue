<template>
<Head>
    <title>{{ __('No Permission') }}</title>
</Head>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 col-12">
                <h1 class="text-danger text-center d-block m-0" style="font-size: 100px">
                    <i class="bi bi-exclamation-triangle"></i>
                </h1>
            </div>
            <div class="col-12 col-lg-8">
                <template v-if="$page.props.language == 'en'">
                    <h1 class="text-danger">Opps! <small>403 Forbidden.</small></h1>
                    <h2>You are no permission to view this page.</h2>
                    <br>
                    <p>Please contact to your administration.</p>
                </template>
                <template v-else>
                    <h1 class="text-danger">នោះ! <small>403 ពុំមានព័ត៌មានអំពីទំព័រនេះទេ!!!</small></h1>
                    <h2>អ្នកគ្មានសិទ្ធគ្រប់គ្រាន់ក្នុងការចូលមកមើលទិន្នន័យក្នុងទំព័រនេះទេ!</h2>
                    <br>
                    <p>សូមទំនាក់ទំនងទៅកាន់អ្នកបច្ចេកទេស ឬ អ្នកគ្រប់គ្រងរបស់អ្នក !!!</p>
                </template>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {

}
</script>

<style>

</style>