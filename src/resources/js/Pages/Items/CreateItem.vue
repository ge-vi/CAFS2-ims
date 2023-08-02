<script setup>
import { Head as InertiaHead, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import DateInput from '@/Components/DateInput.vue';
import InputOptions from '@/Components/BS/InputOptions.vue';
import { trans } from 'laravel-vue-i18n';

defineProps(['owners', 'types']);

const form = useForm({
  name: '',
  owner_id: '',
  type_id: '',
  description: '',
  warranty_start: '',
  warranty_months: '',
  warranty_proof: '',
});
</script>

<template>
  <InertiaHead :title="trans('Create new item')" />

  <AuthenticatedLayout>
    <template #header> Create new item </template>

    <div class="card shadow">
      <div class="card-body">
        <form @submit.prevent="form.post(route('items.store'))">
          <TextInput
            id="name"
            v-model="form.name"
            :errors="form.errors"
            input-label="Name"
          />

          <InputOptions
            id="owner_id"
            v-model="form.owner_id"
            :options="owners.data"
            :errors="form.errors"
            input-label="Owner"
          />

          <InputOptions
            id="type_id"
            v-model="form.type_id"
            :options="types.data"
            :errors="form.errors"
            input-label="Item type"
          />

          <TextInput
            id="description"
            v-model="form.description"
            :errors="form.errors"
            input-label="Description"
          />
          <DateInput
            id="warranty_start"
            v-model="form.warranty_start"
            :errors="form.errors"
            input-label="Warranty start"
          />
          <TextInput
            id="warranty_months"
            v-model="form.warranty_months"
            :errors="form.errors"
            input-label="Warranty period (in months)"
            type="number"
          />
          <TextInput
            id="warranty_proof"
            v-model="form.warranty_proof"
            :errors="form.errors"
            input-label="Warranty proof"
          />

          <PrimaryButton :disabled="form.processing">
            Create new item
          </PrimaryButton>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
