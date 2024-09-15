<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head as InertiaHead, Link, useForm } from '@inertiajs/vue3';
import { trans } from 'laravel-vue-i18n';

defineProps({
  canResetPassword: Boolean,
  status: {
    type: String,
  },
});

const form = useForm({
  email: '',
  password: '',
  remember: false,
});

const submit = () => {
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  });
};
</script>

<template>
  <GuestLayout>
    <InertiaHead :title="trans('Log in')" />

    <div class="card my-5 shadow">
      <div
        v-if="status"
        class="card-body"
      >
        <div class="mb-4">
          {{ status }}
        </div>
      </div>
      <!--card-body-->

      <form @submit.prevent="submit">
        <div class="card-body">
          <TextInput
            id="email"
            v-model="form.email"
            type="email"
            input-label="Email"
            :errors="form.errors"
            required
            autofocus
            autocomplete="username"
          />

          <TextInput
            id="password"
            v-model="form.password"
            type="password"
            input-label="Password"
            :errors="form.errors"
            required
            autocomplete="current-password"
          />

          <Checkbox
            v-model:checked="form.remember"
            class="mt-4"
            name="remember"
            label-text="Remember me"
          />
        </div>
        <!--card-body-->

        <div class="card-footer d-flex justify-content-between">
          <PrimaryButton
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            {{ trans('Log in') }}
          </PrimaryButton>
          <Link
            v-if="canResetPassword"
            class="btn btn-link"
            :href="route('password.request')"
          >
            {{ trans('Forgot your password?') }}
          </Link>
        </div>
        <!--card-footer-->
      </form>
    </div>
    <!--card-->
  </GuestLayout>
</template>
