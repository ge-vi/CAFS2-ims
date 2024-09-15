<script setup>
import { Head as InertiaHead, router, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import ButtonLink from '@/Components/BS/ButtonLink.vue';
import { trans } from 'laravel-vue-i18n';

const props = defineProps(['owner']);
const ownerForm = useForm(props.owner.data); // .data is from Laravel resource

const deleteOwner = () => {
  router.delete(route('owners.destroy', ownerForm), {
    onBefore: () => confirm('Are you sure you want to delete this owner?'),
  });
};
</script>

<template>
  <InertiaHead :title="trans('Edit owner')" />

  <AuthenticatedLayout>
    <template #header>
      Edit owner
    </template>

    <div class="card shadow">
      <form
        @submit.prevent="ownerForm.put(route('owners.update', ownerForm.id))"
      >
        <div class="card-body">
          <TextInput
            id="name"
            v-model="ownerForm.name"
            :errors="ownerForm.errors"
            input-label="Name"
          />

          <TextInput
            id="email"
            v-model="ownerForm.email"
            :errors="ownerForm.errors"
            type="email"
            input-label="Email"
          />

          <TextInput
            id="phone"
            v-model="ownerForm.phone"
            :errors="ownerForm.errors"
            input-label="Phone"
          />
        </div> <!-- /card-body -->

        <div class="card-footer d-flex justify-content-between">
          <PrimaryButton :disabled="ownerForm.processing">
            Update owner
          </PrimaryButton>

          <ButtonLink
            as="button"
            href="#"
            class="btn-danger"
            title="Delete this owner"
            @click.prevent="deleteOwner"
          >
            Delete owner
          </ButtonLink>
        </div>
      </form>
    </div>
  </AuthenticatedLayout>
</template>
