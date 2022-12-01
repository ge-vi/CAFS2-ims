<script setup>
import {Head as InertiaHead, useForm} from '@inertiajs/inertia-vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import DateInput from '@/Components/DateInput.vue';
import InputOptions from "@/Components/BS/InputOptions.vue";

const props = defineProps(['item', 'owners','types']);

const form = useForm(props.item.data);
</script>

<template>
  <InertiaHead title="Edit item" />

  <AuthenticatedLayout>
    <template #header>
      Edit item
    </template>

    <div class="card shadow">
      <div class="card-body">
        <form @submit.prevent="form.put(route('items.update', form.id))">
          <TextInput
            id="name"
            v-model="form.name"
            :errors="form.errors"
            label="Name"
          />

          <InputOptions
            id="owner"
            v-model="form.owner_id"
            :errors="form.errors"
            :options="owners.data"
            label="Owner"
          />

          <InputOptions
            id="type"
            v-model="form.type_id"
            :errors="form.errors"
            :options="types.data"
            label="Type"
          />

          <TextInput
            id="description"
            v-model="form.description"
            :errors="form.errors"
            label="Description"
          />
          <DateInput
            id="warranty_start"
            v-model="form.warranty_start"
            :errors="form.errors"
            label="Warranty start"
          />
          <TextInput
            id="warranty_months"
            v-model="form.warranty_months"
            :errors="form.errors"
            label="Warranty period (in months)"
            type="number"
          />
          <TextInput
            id="warranty_proof"
            v-model="form.warranty_proof"
            :errors="form.errors"
            label="Warranty proof"
          />

          <PrimaryButton :disabled="form.processing">
            Update item
          </PrimaryButton>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
