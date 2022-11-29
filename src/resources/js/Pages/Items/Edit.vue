<script setup>
import {Head as InertiaHead, useForm} from '@inertiajs/inertia-vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import DateInput from '@/Components/DateInput.vue';

const props = defineProps({
    item: {
        type: Object
    },
    owners: {
        type: Array
    },
    types: {
        type: Array
    }
});

const form = useForm(props.item.data);
</script>

<template>
  <InertiaHead title="Edit item" />

  <AuthenticatedLayout>
    <h3 class="h3 text-center my-3">
      Edit item
    </h3>

    <div class="card shadow">
      <div class="card-body">
        <form @submit.prevent="form.put(route('items.update', form.id))">
          <TextInput
            id="item_name"
            v-model="form.name"
            :errors="form.errors"
            label="Name"
          />
          <TextInput
            id="item_owner"
            v-model="form.owner_id"
            :errors="form.errors"
            label="Owner"
          />
          <TextInput
            id="item_type"
            v-model="form.type_id"
            :errors="form.errors"
            label="Type"
          />
          <TextInput
            id="item_description"
            v-model="form.description"
            :errors="form.errors"
            label="Description"
          />
          <DateInput
            id="item_warranty_start"
            v-model="form.warranty_start"
            :errors="form.errors"
            label="Warranty start"
          />
          <TextInput
            id="item_warranty_months"
            v-model="form.warranty_months"
            :errors="form.errors"
            label="Warranty period (in months)"
            type="number"
          />
          <TextInput
            id="item_warranty_proof"
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
