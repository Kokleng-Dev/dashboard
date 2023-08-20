<template>
  <Head>
    <title>{{ __('Role') }}</title>
  </Head>
  <div class="card">
    <div class="card-header border-bottom">
      <h2 class="m-0 text-primary"><i class="fas fa-user-shield"></i> {{ __('Role') }}</h2>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-12">
          <div class="table-responsive p-2" style="zoom: 0.9">
            <ButtonCreate class="mb-3" />
            <table class="table table-hover table-sm dataTable table-bordered  w-100" id="dataTable">
              <thead class="bg-primary-subtle text-primary-emphasis">
                <tr>
                  <th style="max-width: 100px;">{{ __('No.') }}</th>
                  <th>{{ __('Name') }}</th>
                  <th style="max-width: 200px;">{{ __('Action') }}</th>
                </tr>
              <tbody></tbody>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <ModalCreate v-if="$page.props.create" :permission="permission" :table="table" />
  <ModalEdit v-if="$page.props.edit" :data="$page.props.eData" />
</template>

<script setup>
import ModalCreate from "./create.vue";
import ModalEdit from "./edit.vue";
import { onMounted } from "vue";
import { router } from "@inertiajs/vue3";


const permission = base64Encode("role");
const table = base64Encode("roles");
const handleForm = $handleForm;

onMounted(() => {
  $(document).ready(() => {
    window.$table = $("#dataTable").DataTable({
      pageLength: 10,
      processing: true,
      serverSide: true,
      scrollX: true,
      responsive: true,
      autoWidth: false,
      ajax: route("admin.role"),
      columns: [
        {
          data: "DT_RowIndex",
          name: "roles.id",
          searchable: false,
          orderable: true,
        },
        {
          data: "name",
          name: "name",
        },
        {
          data: "action",
          name: "action",
          orderable: false,
          searchable: false,
        },
      ],
      drawCallback: function (settings) {
        $(".btnEdit").each(function () {
          $(this).on("click", async function () {
            const id = $(this).attr("attr-id");
            handleForm.GET({
              el: this,
              tbl: table,
              id: id,
              callback: (response) => {
                $usePage().props.eData = response;
                $usePage().props.eData.eid = id;
                $usePage().props.eData.tbl = table;
                $usePage().props.eData.per = permission;
              },
            });
          });
        });
        $(".btnDelete").each(function () {
          $(this).on("click", function () {
            handleForm.DELETE({
              el: this,
              per: permission,
              tbl: table,
            });
          });
        });
        $(".permission").each(function () {
          $(this).on("click", function () {
            router.visit(route('admin.role_permission', $(this).attr('attr-id')))
          });
        });
        $('select[name="dataTable_length"]').select2({
          dropdownParent: $('select[name="dataTable_length"]').parent(),
          minimumResultsForSearch: Infinity
        });
      },
    });
  })
});
</script>