<template>
    <form @submit.prevent="handleSubmit($event)" novalidate>
        <div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5"><small><i class="fa fa-plus-circle"></i></small> {{ __("Create") }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="name" class="col-3 col-form-label">{{ __("Name") }} <span
                                    class="text-danger">*</span></label>
                            <div class="col-9">
                                <input type="text" v-model="form.name" class="form-control" id="name" required />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">
                            <i class="fas fa-times-circle"></i> {{ __("Close") }}
                        </button>
                        <button type="submit" :disabled="form.processing" class="btn btn-primary btn-sm" id="btnSave">
                            <Spinner v-if="form.processing" />
                            <i v-else class="fas fa-save"></i>
                            {{ __("Save") }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>
<script>
</script>
  
<script setup>
const props = defineProps({
    permission: String,
    table: String,
});

const form = $useForm({
    name: "",
    per: props.permission,
    tbl: props.table,
});

async function handleSubmit(event) {
    form.role_id = $("#role").val();
    try {
        await $handleForm.POST({
            event: event,
            form: form,
            action: "create",
        });
    } catch (error) {
        console.log(error);
    }
}
</script>