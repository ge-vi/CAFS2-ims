<script setup>
import { Head as InertiaHead, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { trans } from 'laravel-vue-i18n';

defineProps(['owner', 'items']);
</script>

<template>
  <InertiaHead :title="trans('Owner info')" />

  <AuthenticatedLayout>
    <template #header> Owner info with owned items </template>

    <div class="row">
      <div class="col">
        <div class="card mb-3">
          <div class="card-body">
            <p v-if="owner.name" class="m-0">
              <small class="text-muted">name</small><br />{{ owner.name }}
            </p>
            <p v-if="owner.email" class="m-0">
              <small class="text-muted">email</small><br />{{ owner.email }}
            </p>
            <p v-if="owner.phone" class="m-0">
              <small class="text-muted">phone</small><br />{{ owner.phone }}
            </p>
          </div>
          <div class="card-footer">
            <Link
              class="btn btn-outline-primary"
              :href="route('owners.edit', owner)"
            >
              Edit owner data
            </Link>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col">
        <h4>Items owned by: {{ owner.name }}</h4>

        <table
          v-if="items"
          class="table table-striped table-hover align-middle"
        >
          <thead>
            <tr>
              <th>#</th>
              <th>INV #</th>
              <th>Name</th>
              <th>Description</th>
              <th>Type</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item, index) in items" :key="item.id">
              <td>{{ ++index }}</td>
              <td>{{ item?.inv }}</td>
              <td>{{ item?.name }}</td>
              <td>{{ item?.description }}</td>
              <td>{{ item?.type?.name }}</td>
              <td>
                <Link
                  class="btn btn-outline-primary"
                  :href="route('items.edit', item.id)"
                >
                  edit
                </Link>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!--col-->
    </div>
    <!--row-->
  </AuthenticatedLayout>
</template>
