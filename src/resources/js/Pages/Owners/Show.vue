<script setup>
import {Head as InertiaHead, Link} from '@inertiajs/inertia-vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps(['owner', 'items']);
</script>

<template>
  <InertiaHead title="Owner info" />

  <AuthenticatedLayout>
    <h3 class="h3 text-center my-3">
      Owner info with owned items
    </h3>

      <div class="row">
          <div class="col">
              <div class="card mb-3">
                  <div class="card-body">
                  <p class="m-0">{{ owner.name }}<br>
                      {{ owner.email }}<br>
                      {{ owner.phone }}</p>
                  </div>
              </div>
          </div>
      </div>


    <div class="row">
        <div class="col">

            <h4>Items owned by {{ owner.name }}</h4>

            <table class="table table-striped table-hover">
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
                <tr v-for="(item, index) in items" :key="item.id">
                    <td>{{ ++index }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.description }}</td>
                    <td>{{ item.type.name }}</td>
                    <td><Link
                        class="btn btn-outline-primary"
                        :href="route('items.edit', item.id)">edit</Link> </td>
                </tr>
                </tbody>
            </table>

        </div> <!--col-->
    </div> <!--row-->
  </AuthenticatedLayout>
</template>
