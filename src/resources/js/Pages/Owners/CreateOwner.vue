<script setup>
import {Head as InertiaHead, useForm} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
  name: '',
  email: '',
  phone: ''
});

</script>

<template>
  <InertiaHead title="Create owner" />

  <AuthenticatedLayout>
    <template #header>
      Create owner
    </template>

    <div class="card shadow">
      <div class="card-body">
        <form @submit.prevent="form.post(route('owners.store'))">
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
            label="Email"
            type="email"
          />

          <TextInput
            id="phone"
            v-model="form.phone"
            :errors="form.errors"
            label="Phone"
          />

          <PrimaryButton :disabled="form.processing">
            Create new owner
          </PrimaryButton>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
