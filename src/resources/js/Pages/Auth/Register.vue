<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head as InertiaHead, Link, useForm} from '@inertiajs/vue3';

defineProps({
  status: String,
});

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  terms: false,
});

const submit = () => {
  form.post(route('register'), {
    onFinish: () => form.reset('password', 'password_confirmation'),
  });
};
</script>

<template>
  <GuestLayout>
    <InertiaHead title="Register" />

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
            id="name"
            v-model="form.name"
            type="text"
            label="Name"
            :errors="form.errors"
            required
            autofocus
            autocomplete="name"
          />

          <TextInput
            id="email"
            v-model="form.email"
            type="email"
            label="Email"
            :errors="form.errors"
            required
            autocomplete="username"
          />

          <TextInput
            id="password"
            v-model="form.password"
            type="password"
            label="Password"
            :errors="form.errors"
            required
            autocomplete="new-password"
          />

          <TextInput
            id="password_confirmation"
            v-model="form.password_confirmation"
            type="password"
            label="Confirm Password"
            :errors="form.errors"
            required
            autocomplete="new-password"
          />
        </div>
        <!--card-body-->

        <div class="card-footer">
          <Link
            :href="route('login')"
            class="pe-2"
          >
            Already registered?
          </Link>

          <PrimaryButton
            class="ml-4"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            Register
          </PrimaryButton>
        </div>
        <!--card-footer-->
      </form>
    </div>
    <!--card-->
  </GuestLayout>
</template>
