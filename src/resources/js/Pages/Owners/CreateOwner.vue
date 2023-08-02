<script setup>
import { Head as InertiaHead, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { trans } from 'laravel-vue-i18n';

const form = useForm({
  name: '',
  email: '',
  phone: '',
});
</script>

<template>
  <InertiaHead :title="trans('Create owner')" />

  <AuthenticatedLayout>
    <template #header> Create owner </template>

    <div class="card shadow">
      <div class="card-body">
        <form @submit.prevent="form.post(route('owners.store'))">
          <TextInput
            id="name"
            v-model="form.name"
            :errors="form.errors"
            input-label="Name"
          />

          <TextInput
            id="email"
            v-model="form.email"
            :errors="form.errors"
            input-label="Email"
            type="email"
          />

          <TextInput
            id="phone"
            v-model="form.phone"
            :errors="form.errors"
            input-label="Phone"
          />

          <PrimaryButton :disabled="form.processing">
            Create new owner
          </PrimaryButton>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
