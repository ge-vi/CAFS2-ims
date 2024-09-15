<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head as InertiaHead, useForm } from '@inertiajs/vue3';
import { trans } from 'laravel-vue-i18n';

const form = useForm({
  password: '',
});

const submit = () => {
  form.post(route('password.confirm'), {
    onFinish: () => form.reset(),
  });
};
</script>

<template>
  <GuestLayout>
    <InertiaHead :title="trans('Confirm Password')" />

    <p>
      {{
        trans(
          'This is a secure area of the application. Please confirm your password before continuing.'
        )
      }}
    </p>

    <form @submit.prevent="submit">
      <div>
        <TextInput
          id="password"
          v-model="form.password"
          type="password"
          input-label="Password"
          required
          autocomplete="current-password"
          autofocus
        />
        <InputError
          class="mb-4"
          :message="form.errors.password"
        />
      </div>

      <div class="flex justify-end mt-4">
        <PrimaryButton
          class="ml-4"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          {{ trans('Confirm') }}
        </PrimaryButton>
      </div>
    </form>
  </GuestLayout>
</template>
