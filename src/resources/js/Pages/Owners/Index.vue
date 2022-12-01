<script setup>
import { Head as InertiaHead, Link } from '@inertiajs/inertia-vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps(['owners']);
</script>

<template>
  <InertiaHead title="Owners list" />

  <AuthenticatedLayout>
    <template #header>
        Owners list
    </template>

    <div class="row">
      <div class="col">
        <table class="table table-striped table-hover align-middle">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="owner in owners"
              :key="owners.id"
            >
              <td>{{ owner.name }}</td>
              <td>{{ owner.email }}</td>
              <td>{{ owner.phone }}</td>
              <td>
                <Link
                  class="btn btn-outline-primary"
                  :href="route('owners.show', owner.id)"
                >
                  view
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
