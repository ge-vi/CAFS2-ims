<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import ItemType from '@/Components/ItemType.vue';

defineProps(['types']);

const form = useForm({
    name: '',
    period: '',
});
</script>

<template>
  <Head title="Inventory types" />

  <AuthenticatedLayout>
    <h3>Available items types</h3>

    <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
      <ItemType
        v-for="type in types"
        :key="type.id"
        :item-type="type"
      />
    </div>

    <hr>

    <h3>Add new item type</h3>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
      <form
        @submit.prevent="
          form.post(route('types.store'), {
            onSuccess: () => form.reset(),
          })
        "
      >
        <input
          v-model="form.name"
          placeholder="Inventory type"
          type="text"
          class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        >
        <InputError
          :message="form.errors.message"
          class="mt-2"
        />

        <input
          v-model="form.period"
          placeholder="How long it should be used (in months)?"
          type="number"
          class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        >
        <InputError
          :message="form.errors.message"
          class="mt-2"
        />

        <PrimaryButton class="mt-4">
          Save
        </PrimaryButton>
      </form>
    </div>
  </AuthenticatedLayout>
</template>
