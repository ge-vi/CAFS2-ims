<script setup>
import { Head as InertiaHead, Link, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/BS/TextArea.vue';
import { trans } from 'laravel-vue-i18n';

defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
});

const formDemand = useForm({
  item_name: '',
  item_description: '',
  owner_name: '',
  owner_email: '',
  owner_phone: '',
});
</script>

<template>
  <InertiaHead :title="trans('Welcome')" />

  <div class="row">
    <div class="col">
      <h1 class="h1 text-center py-5">
        {{ trans('Welcome to Inventory Management System') }}
      </h1>

      <div
        v-if="$page.props.flash.message"
        class="alert alert-primary my-2"
        role="alert"
      >
        {{ $page.props.flash.message }}
      </div>
    </div>
  </div>

  <div class="row row-cols-1 row-cols-md-2">
    <!--left column-->
    <div class="col">
      <div class="card text-bg-light">
        <div class="card-header">
          <h2 class="text-center">
            {{ trans('Describe new demand') }}
          </h2>
        </div>
        <form
          @submit.prevent="
            formDemand.post(route('demand.store'), {
              onSuccess: () => formDemand.reset(),
            })
          "
        >
          <div class="card-body">
            <TextInput
              id="item_name"
              v-model="formDemand.item_name"
              :errors="formDemand.errors"
              input-label="Item name"
              help-text="Short item name"
            />
            <TextArea
              id="item_description"
              v-model="formDemand.item_description"
              :errors="formDemand.errors"
              textarea-label="Item description"
              textarea-placeholder="Item description"
            />
          </div>
          <div class="card-body">
            <TextInput
              id="owner_name"
              v-model="formDemand.owner_name"
              :errors="formDemand.errors"
              input-label="Your name"
            />
            <TextInput
              id="owner_email"
              v-model="formDemand.owner_email"
              :errors="formDemand.errors"
              input-label="Your email"
            />
            <TextInput
              id="owner_phone"
              v-model="formDemand.owner_phone"
              :errors="formDemand.errors"
              input-label="Your phone (only numbers)"
            />
          </div>
          <div class="card-footer">
            <PrimaryButton :disabled="formDemand.processing">
              {{ trans('Submit new demand') }}
            </PrimaryButton>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col">
      <Link
        v-if="canRegister && !$page.props.auth.user"
        :href="route('register')"
        class="btn btn-outline-primary me-2"
      >
        {{ trans('Register') }}
      </Link>

      <template v-if="canLogin">
        <Link
          v-if="$page.props.auth.user"
          :href="route('dashboard')"
          class="btn btn-outline-primary"
        >
          {{ trans('Dashboard') }}
        </Link>
        <Link v-else :href="route('login')" class="btn btn-outline-primary">
          {{ trans('Log in') }}
        </Link>
      </template>
    </div>
  </div>
</template>
