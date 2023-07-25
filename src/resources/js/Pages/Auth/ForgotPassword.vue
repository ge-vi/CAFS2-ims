<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head as InertiaHead, useForm } from '@inertiajs/vue3';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
  <GuestLayout>
    <InertiaHead title="Forgot Password" />

    <div class="card my-5 shadow">
      <div class="card-body">
        {{ $t('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
      </div>

      <div
        v-if="status"
        class="card-body"
      >
        <div class="alert alert-primary my-2">
          {{ status }}
        </div>
      </div> <!--.card-body-->

      <form @submit.prevent="submit">
        <div class="card-body">
          <TextInput
            id="email"
            v-model="form.email"
            type="email"
            label="Email"
            :errors="form.errors.email"
            required
            autofocus
            autocomplete="username"
          />
        </div>
        <div class="card-footer">
          <PrimaryButton
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            {{ $t('Email Password Reset Link') }}
          </PrimaryButton>
        </div>
      </form>
    </div>
  </GuestLayout>
</template>
