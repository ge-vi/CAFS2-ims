<script setup>
import {Head as InertiaHead, Link} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps(['owner', 'items', 'faults']);
</script>

<template>
  <InertiaHead title="Owner info"/>

  <AuthenticatedLayout>
    <template #header>
      Owner info with owned items
    </template>

    <div class="row">
      <div class="col">
        <div class="card mb-3">
          <div class="card-body">
            <p
              v-if="owner.name"
              class="m-0"
            >
              <small class="text-muted">name</small><br>{{ owner.name }}
            </p>
            <p
              v-if="owner.email"
              class="m-0"
            >
              <small class="text-muted">email</small><br>{{ owner.email }}
            </p>
            <p
              v-if="owner.phone"
              class="m-0"
            >
              <small class="text-muted">phone</small><br>{{ owner.phone }}
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

    <div class="row">
      <div class="col">
        <h4>Items owned by: {{ owner.name }}</h4>

        <table
          v-if="items"
          class="table table-striped table-hover align-middle"
        >
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Description</th>
              <th>Type</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="(item, index) in items"
              :key="item.id"
            >
              <td>{{ ++index }}</td>
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

    <div class="row">
      <div class="col">
        <h4>Registered faults by: {{ owner.name }}</h4>

        <table
          v-if="faults"
          class="table table-striped table-hover align-middle"
        >
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Description</th>
              <th>Service info</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="(item, index) in faults"
              :key="item.id"
            >
              <td>{{ ++index }}</td>
              <td>{{ item?.name }}</td>
              <td>{{ item?.description }}</td>
              <td>{{ item?.service_info }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!--col-->
    </div>
    <!--row-->
  </AuthenticatedLayout>
</template>
