<script setup>
import {Head as InertiaHead, useForm} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import DropdownLink from '@/Components/DropdownLink.vue';

const props = defineProps(['owner']);
const ownerForm = useForm(props.owner.data);

const deleteOwner = () => {
  router.delete(route('owners.destroy', ownerForm), {
    onBefore: () => confirm('Are you sure you want to delete this owner?'),
  });
};
</script>

<template>
  <InertiaHead title="Edit owner" />

  <AuthenticatedLayout>
    <template #header>
      Edit owner
    </template>

    <div class="card shadow">
      <form @submit.prevent="ownerForm.put(route('owners.update', ownerForm.id))">
        <div class="card-body">
          <TextInput
            id="name"
            v-model="ownerForm.name"
            :errors="ownerForm.errors"
            label="Name"
          />

          <TextInput
            id="email"
            v-model="ownerForm.email"
            :errors="ownerForm.errors"
            type="email"
            label="Email"
          />

          <TextInput
            id="phone"
            v-model="ownerForm.phone"
            :errors="ownerForm.errors"
            label="Phone"
          />
        </div>
        <!--card-body-->
        <div class="card-footer d-flex justify-content-between">
          <PrimaryButton :disabled="ownerForm.processing">
            Update owner
          </PrimaryButton>

          <DropdownLink
            as="button"
            href="#"
            class="btn-danger"
            title="Delete this owner"
            @click.prevent="deleteOwner"
          >
            Delete owner
          </DropdownLink>
        </div>
      </form>
    </div>
  </AuthenticatedLayout>
</template>
