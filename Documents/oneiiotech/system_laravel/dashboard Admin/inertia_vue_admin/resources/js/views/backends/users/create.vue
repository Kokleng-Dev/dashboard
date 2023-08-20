<template>
  <form @submit.prevent="handleSubmit($event)" novalidate>
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5"><small><i class="fa fa-plus-circle"></i></small> {{ __('Create') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="row mb-3">
                                <label for="name" class="col-4 col-form-label">{{ __('Name') }}<span
                                        class="text-danger">*</span></label>
                                <div class="col">
                                    <input v-model="form.name" type="text" class="form-control" id="name" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="username" class="col-4 col-form-label">{{ __('Username') }}<span
                                        class="text-danger">*</span></label>
                                <div class="col">
                                    <input v-model="form.username" type="text" class="form-control" id="username" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="role" class="col-4 col-form-label">{{ __('Role') }}<span
                                        class="text-danger">*</span></label>
                                <div class="col">
                                    <select id="role" class="selectOption2 form-control" data-minimum-results-for-search="Infinity" required>
                                        <option value="">Please Select</option>
                                        <option :value="role.id" v-for="role in $page.props.roles" :key="role.id">{{ role.name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone" class="col-4 col-form-label">{{ __('Phone') }}<span
                                        class="text-danger">*</span></label>
                                <div class="col">
                                    <input type="text" v-model="form.phone" class="form-control" id="phone" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-4 col-form-label">{{ __('Password') }} <span
                                        class="text-danger">*</span></label>
                                <div class="col">
                                    <input type="password" v-model="form.password" class="form-control" autocomplete='off' id="password" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="row mb-3">
                                <label for="photo" class="col-lg-3 col-4 col-form-label">{{ __('Photo') }}</label>
                                <div class="col">
                                    <input type="file" @input="form.photo = $event.target.files[0]" class="form-control" id="photo" accept="image/*">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="w-100 text-center img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> {{ __('Close') }}</button>
                    <button type="submit" :disabled="form.processing"  class="btn btn-primary btn-sm" id="btnSave">
                        <Spinner v-if="form.processing" />
                        <i v-else class="fas fa-save"></i> 
                        {{ __('Save') }} 
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
        table: String
    })

    const form = $useForm({
        username: '',
        password: '',
        name : '',
        role_id : '',
        phone : '',
        photo : '',
        per : props.permission,
        tbl : props.table,
    });
    
    async function handleSubmit(event){
        form.role_id = $('#role').val();
        try {
            await $handleForm.POST({
                event : event,
                form : form,
                url : window.$route('admin.user.store'),
                action : 'create'
            });
        } catch (error) {
            console.log(error);
        }
    }
</script>