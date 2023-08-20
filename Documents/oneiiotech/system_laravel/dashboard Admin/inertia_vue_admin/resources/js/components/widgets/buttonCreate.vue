<template>
    <button v-if="$page.props.create" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#create">
        <i class="fa fa-plus-circle me-1"></i>
        {{ __('Create') }}
    </button>
</template>

<script>
export default {
    name : 'ButtonCreate'
}
</script>

<style>

</style>