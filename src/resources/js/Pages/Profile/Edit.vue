<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head as InertiaHead } from '@inertiajs/vue3';
import { trans } from 'laravel-vue-i18n';
import SimpleCard from '@/Components/BS/SimpleCard.vue';

defineProps({
  mustVerifyEmail: Boolean,
  status: String,
});
</script>

<template>
  <InertiaHead :title="trans('Profile')" />

  <AuthenticatedLayout>
    <template #header>
      {{ trans('Profile') }}
    </template>

    <div class="py-0">
      <SimpleCard>
        <template #body>
          <UpdateProfileInformationForm
            :must-verify-email="mustVerifyEmail"
            :status="status"
          />
        </template>
      </SimpleCard>

      <SimpleCard>
        <template #body>
          <UpdatePasswordForm />
        </template>
      </SimpleCard>

      <SimpleCard>
        <template #body>
          <DeleteUserForm />
        </template>
      </SimpleCard>
    </div>
  </AuthenticatedLayout>
</template>
