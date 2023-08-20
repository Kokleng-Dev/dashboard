<template>
    <form @submit.prevent="handleSubmit($event)" novalidate>
        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="create" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5"><small><i class="fas fa-pen-alt"></i></small> {{ __("Edit") }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="ename" class="col-3 col-form-label">{{ __('Name') }} <span
                                    class="text-danger">*</span></label>
                            <div class="col-9">
                                <input type="text" v-model="form.name" class="form-control" id="ename" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">
                            <i class="fas fa-times-circle"></i>
                            {{ __("Close") }}
                        </button>
                        <button type="submit" :disabled="form.processing" class="btn btn-primary btn-sm" id="btnUpdate">
                            <Spinner v-if="form.processing" />
                            <i v-else class="fas fa-save"></i>
                            {{ __("Update") }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>
<script setup>
import { watch } from "vue";

const props = defineProps({
    data : Object
})

let form = $useForm({});
watch(()=> props.data, (after,before) => {
    form = $useForm(props.data)
});


async function handleSubmit(event) {
    form.role_id = $("#erole").val();
    try {
        await window.$handleForm.POST({
            event: event,
            form: form,
            action: "update",
            objs : {
                forceFormData : true
            }
        });
    } catch (error) {
        console.log(error);
    }
}
</script>
