<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head as InertiaHead, Link, useForm } from '@inertiajs/vue3';

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

          <div class="form-check mt-4">
              <Checkbox
                v-model:checked="form.remember"
                name="remember"
            />
            <label class="form-check-label">{{ $t('Remember me') }}</label>
          </div>
        </div>
        <!--card-body-->

        <div class="card-footer d-flex justify-content-between">
          <PrimaryButton
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            {{ $t('Log in') }}
          </PrimaryButton>
          <Link
            v-if="canResetPassword"
            class="btn btn-link"
            :href="route('password.request')"
          >
            {{ $t('Forgot your password?') }}
          </Link>
        </div>
        <!--card-footer-->
      </form>
    </div>
    <!--card-->
  </GuestLayout>
</template>
