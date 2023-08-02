<script setup>
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import { trans } from 'laravel-vue-i18n';
import button from 'bootstrap/js/src/button';

const props = defineProps({
  mustVerifyEmail: Boolean,
  status: String,
});

const user = usePage().props.auth.user;

const form = useForm({
  name: user.name,
  email: user.email,
});
</script>

<template>
  <section>
    <header>
      <h2>
        {{ trans('Profile Information') }}
      </h2>

      <p>
        {{
          trans("Update your account's profile information and email address.")
        }}
      </p>
    </header>

    <form class="mt-4" @submit.prevent="form.patch(route('profile.update'))">
      <TextInput
        id="name"
        v-model="form.name"
        type="text"
        input-label="Name"
        help-text="Your name"
        required
        autofocus
        autocomplete="name"
      />
      <InputError class="mb-4" :message="form.errors.name" />

      <TextInput
        id="email"
        v-model="form.email"
        type="email"
        class="mt-1 block w-full"
        input-label="Email"
        help-text="Your email"
        required
        autocomplete="email"
      />
      <InputError class="mb-4" :message="form.errors.email" />

      <div v-if="props.mustVerifyEmail && user.email_verified_at === null">
        <p class="text-sm mt-2">
          {{ trans('Your email address is unverified.') }}
          <Link :href="route('verification.send')" method="post" :as="button">
            {{ trans('Click here to re-send the verification email.') }}
          </Link>
        </p>

        <div v-show="props.status === 'verification-link-sent'">
          {{
            trans(
              'A new verification link has been sent to your email address.'
            )
          }}
        </div>
      </div>

      <div class="flex items-center gap-4">
        <PrimaryButton :disabled="form.processing">
          {{ trans('Save') }}
        </PrimaryButton>

        <Transition
          enter-from-class="opacity-0"
          leave-to-class="opacity-0"
          class="transition ease-in-out"
        >
          <p v-if="form.recentlySuccessful" class="text-sm">
            {{ trans('Saved.') }}
          </p>
        </Transition>
      </div>
    </form>
  </section>
</template>
