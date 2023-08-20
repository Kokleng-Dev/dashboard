<template>
    <Head>
        <title>{{ __('Company') }}</title>
    </Head>
    <h2>
        Hello
    </h2>
    <Link :href="$route('admin.home')">Home</Link>
</template>

<script>
export default{
    mounted(){
    }
}
</script>

<style>

</style>