<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head as InertiaHead, useForm } from '@inertiajs/vue3';
import { trans } from 'laravel-vue-i18n';

const props = defineProps({
  email: String,
  token: String,
});

const form = useForm({
  token: props.token,
  email: props.email,
  password: '',
  password_confirmation: '',
});

const submit = () => {
  form.post(route('password.store'), {
    onFinish: () => form.reset('password', 'password_confirmation'),
  });
};
</script>

<template>
  <GuestLayout>
    <InertiaHead :title="trans('Reset Password')" />

    <form @submit.prevent="submit">
      <TextInput
        id="email"
        v-model="form.email"
        type="email"
        input-label="Email"
        required
        autofocus
        autocomplete="username"
      />
      <InputError class="mt-2" :message="form.errors.email" />

      <div class="mt-4">
        <TextInput
          id="password"
          v-model="form.password"
          type="password"
          input-label="Password"
          required
          autocomplete="new-password"
        />
        <InputError class="mb-4" :message="form.errors.password" />
      </div>

      <div class="mt-4">
        <TextInput
          id="password_confirmation"
          v-model="form.password_confirmation"
          type="password"
          input-label="Confirm Password"
          required
          autocomplete="new-password"
        />
        <InputError class="mb-4" :message="form.errors.password_confirmation" />
      </div>

      <div class="flex items-center justify-end mt-4">
        <PrimaryButton
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          {{ trans('Reset Password') }}
        </PrimaryButton>
      </div>
    </form>
  </GuestLayout>
</template>
