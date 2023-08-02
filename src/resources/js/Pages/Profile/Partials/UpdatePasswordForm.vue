<script setup>
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import { trans } from 'laravel-vue-i18n';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
  current_password: '',
  password: '',
  password_confirmation: '',
});

const updatePassword = () => {
  form.put(route('password.update'), {
    preserveScroll: true,
    onSuccess: () => form.reset(),
    onError: () => {
      if (form.errors.password) {
        form.reset('password', 'password_confirmation');
        passwordInput.value.focus();
      }
      if (form.errors.current_password) {
        form.reset('current_password');
        currentPasswordInput.value.focus();
      }
    },
  });
};
</script>

<template>
  <section>
    <header>
      <h2>
        {{ trans('Update Password') }}
      </h2>

      <p>
        {{
          trans(
            'Ensure your account is using a long, random password to stay secure.'
          )
        }}
      </p>
    </header>

    <form class="mt-4" @submit.prevent="updatePassword">
      <TextInput
        id="current_password"
        ref="currentPasswordInput"
        v-model="form.current_password"
        type="password"
        input-label="Current Password"
        help-text="Your current password"
        autocomplete="current-password"
      />
      <InputError class="mb-4" :message="form.errors.current_password" />

      <TextInput
        id="password"
        ref="passwordInput"
        v-model="form.password"
        type="password"
        input-label="New Password"
        help-text="Type new password"
        autocomplete="new-password"
      />
      <InputError :message="form.errors.password" class="mt-2" />

      <TextInput
        id="password_confirmation"
        v-model="form.password_confirmation"
        type="password"
        input-label="Confirm Password"
        help-text="Repeat new password"
        autocomplete="new-password"
      />
      <InputError :message="form.errors.password_confirmation" class="mt-2" />

      <div class="flex items-center gap-4">
        <PrimaryButton :disabled="form.processing">
          {{ trans('Save') }}
        </PrimaryButton>

        <Transition
          enter-from-class="opacity-0"
          leave-to-class="opacity-0"
          class="transition ease-in-out"
        >
          <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">
            {{ trans('Saved.') }}
          </p>
        </Transition>
      </div>
    </form>
  </section>
</template>
