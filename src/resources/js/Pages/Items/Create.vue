<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import DateInput from '@/Components/DateInput.vue';

const form = useForm({
    item_name: '',
    item_owner: '',
    item_type: '',
    item_description: '',
    item_warranty_start: '',
    item_warranty_months: '',
    item_warranty_proof: '',
});
</script>

<template>
  <Head title="Create new item" />

  <AuthenticatedLayout>
    <h3>Create new item</h3>

    <form @submit.prevent="form.post(route('items.store'))">
      <TextInput
        id="item_name"
        v-model="form.item_name"
        :errors="form.errors"
        label="Name"
      />
      <TextInput
        id="item_owner"
        v-model="form.item_owner"
        :errors="form.errors"
        label="Owner"
      />
      <TextInput
        id="item_type"
        v-model="form.item_type"
        :errors="form.errors"
        label="Type"
      />
      <TextInput
        id="item_description"
        v-model="form.item_description"
        :errors="form.errors"
        label="Description"
      />
      <DateInput
        id="item_warranty_start"
        v-model="form.item_warranty_start"
        :errors="form.errors"
        label="Warranty start"
      />
      <TextInput
        id="item_warranty_months"
        v-model="form.item_warranty_months"
        :errors="form.errors"
        label="Warranty period (in months)"
        type="number"
      />
      <TextInput
        id="item_warranty_proof"
        v-model="form.item_warranty_proof"
        :errors="form.errors"
        label="Warranty proof"
      />

      <PrimaryButton :disabled="form.processing">
        Create new item
      </PrimaryButton>
    </form>
  </AuthenticatedLayout>
</template>
