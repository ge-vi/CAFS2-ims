<script setup>
import { Head as InertiaHead, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import DateInput from '@/Components/DateInput.vue';
import InputOptions from '@/Components/BS/InputOptions.vue';
import { trans } from 'laravel-vue-i18n';

const props = defineProps(['item', 'owners', 'types']);

const form = useForm(props.item.data);
</script>

<template>
  <InertiaHead :title="trans('Edit item')" />

  <AuthenticatedLayout>
    <template #header> Edit item: {{ form.inv }} </template>

    <div class="card shadow">
      <div class="card-body">
        <form @submit.prevent="form.put(route('items.update', form.id))">
          <TextInput
            id="name"
            v-model="form.name"
            :errors="form.errors"
            input-label="Name"
          />

          <InputOptions
            id="owner_id"
            v-model="form.owner.id"
            :errors="form.errors"
            :options="owners.data"
            input-label="Owner"
          />

          <InputOptions
            id="type_id"
            v-model="form.type.id"
            :errors="form.errors"
            :options="types.data"
            input-label="Type"
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
            Update item
          </PrimaryButton>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
