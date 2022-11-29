<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head as InertiaHead, Link, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
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
    <InertiaHead title="Log in" />

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
            label="Email"
            :errors="form.errors"
            required
            autofocus
            autocomplete="username"
          />

          <TextInput
            id="password"
            v-model="form.password"
            type="password"
            label="Password"
            :errors="form.errors"
            required
            autocomplete="current-password"
          />

          <div class="block mt-4">
            <label class="flex items-center">
              <Checkbox
                v-model:checked="form.remember"
                name="remember"
              />
              <span class="ml-2 text-sm text-gray-600">Remember me</span>
            </label>
          </div>
        </div>
        <!--card-body-->

        <div class="card-footer">
          <Link
            v-if="canResetPassword"
            :href="route('password.request')"
            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          >
            Forgot your password?
          </Link>

          <PrimaryButton
            class="ml-4"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            Log in
          </PrimaryButton>
        </div>
        <!--card-footer-->
      </form>
    </div>
    <!--card-->
  </GuestLayout>
</template>
