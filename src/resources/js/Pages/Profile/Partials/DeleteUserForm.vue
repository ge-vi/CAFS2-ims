<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';
import { trans } from 'laravel-vue-i18n';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
  password: '',
});

const confirmUserDeletion = () => {
  confirmingUserDeletion.value = true;

  nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
  form.delete(route('profile.destroy'), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
    onError: () => passwordInput.value.focus(),
    onFinish: () => form.reset(),
  });
};

const closeModal = () => {
  confirmingUserDeletion.value = false;

  form.reset();
};
</script>

<template>
  <section>
    <header>
      <h2>
        {{ trans('Delete Account') }}
      </h2>

      <p>
        {{
          trans(
            'Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'
          )
        }}
      </p>
    </header>

    <DangerButton @click="confirmUserDeletion">
      {{ trans('Delete Account') }}
    </DangerButton>

    <Modal :show="confirmingUserDeletion" @close="closeModal">
      <div class="p-6">
        <h2>
          {{ trans('Are you sure your want to delete your account?') }}
        </h2>

        <p>
          {{
            trans(
              'Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.'
            )
          }}
        </p>

        <TextInput
          id="password"
          ref="passwordInput"
          v-model="form.password"
          type="password"
          input-label="Password"
          placeholder="Password"
          @keyup.enter="deleteUser"
        />

        <InputError :message="form.errors.password" class="mt-2" />

        <div class="mt-6 flex justify-end">
          <SecondaryButton @click="closeModal">
            {{ trans('Cancel') }}
          </SecondaryButton>

          <DangerButton
            class="ml-3"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
            @click="deleteUser"
          >
            {{ trans('Delete Account') }}
          </DangerButton>
        </div>
      </div>
    </Modal>
  </section>
</template>
