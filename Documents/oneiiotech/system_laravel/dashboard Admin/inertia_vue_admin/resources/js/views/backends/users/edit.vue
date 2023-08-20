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
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="row mb-3">
                                    <label for="ename" class="col-4 col-form-label">{{ __("Name") }}<span
                                            class="text-danger">*</span></label>
                                    <div class="col">
                                        <input v-model="form.name" type="text" class="form-control" id="ename" required />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="eusername" class="col-4 col-form-label">{{ __("Username")
                                    }}<span class="text-danger">*</span></label>
                                    <div class="col">
                                        <input v-model="form.username" type="text" class="form-control" id="eusername"
                                            required />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="erole" class="col-4 col-form-label">{{ __("Role") }}<span
                                            class="text-danger">*</span></label>
                                    <div class="col">
                                        <select id="erole" class="selectOption2 form-control"
                                            data-minimum-results-for-search="Infinity" required>
                                            <option value="">Please Select</option>
                                            <option :selected="role.id == form.role_id" :value="role.id" v-for="role in $page.props.roles" :key="role.id">
                                                {{ role.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="ephone" class="col-4 col-form-label">{{ __("Phone") }}<span
                                            class="text-danger">*</span></label>
                                    <div class="col">
                                        <input type="text" v-model="form.phone" class="form-control" id="ephone" required />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="epassword" class="col-4 col-form-label">{{ __("Password") }} </label>
                                    <div class="col">
                                        <input type="password" v-model="form.password" class="form-control"
                                            autocomplete="off" id="epassword" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="row mb-3">
                                    <label for="ephoto" class="col-lg-3 col-4 col-form-label">{{
                                        __("Photo")
                                    }}</label>
                                    <div class="col">
                                        <input type="file" @input="form.photo = $event.target.files[0]" class="form-control"
                                            id="ephoto" accept="image/*" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="w-100 text-center img"></div>
                                    </div>
                                </div>
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
            url : $route('admin.user.update'),
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
