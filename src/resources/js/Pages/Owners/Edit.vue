<script setup>
import {Head as InertiaHead, useForm} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps(['owner']);

const form = useForm(props.item.data);

</script>

<template>
  <InertiaHead title="Edit owner" />

  <AuthenticatedLayout>
    <template #header>
      Edit owner
    </template>

    <div class="card shadow">
      <div class="card-body">
        <form @submit.prevent="form.put(route('owners.update', form.id))">
          <TextInput
            id="name"
            v-model="form.name"
            :errors="form.errors"
            label="Name"
          />

          <TextInput
            id="email"
            v-model="form.email"
            :errors="form.errors"
            type="email"
            label="Email"
          />

          <TextInput
            id="phone"
            v-model="form.phone"
            :errors="form.errors"
            label="Phone"
          />

          <PrimaryButton :disabled="form.processing">
            Update owner
          </PrimaryButton>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>

</template>
