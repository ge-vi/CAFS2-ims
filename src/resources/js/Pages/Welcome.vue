<script setup>
import { Head as InertiaHead, Link, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/BS/TextArea.vue';

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

const formRepair = useForm({
    fault_name: '',
    fault_description: '',
    fault_inv: '',
    owner_name: '',
    owner_email: '',
    owner_phone: '',
});
</script>

<template>
  <InertiaHead title="Welcome" />

  <div class="row">
    <div class="col">
      <h1 class="h1 text-center py-5">
        {{ $t('Welcome to Inventory Management System') }}
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
            {{ $t('Describe new demand') }}
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
              label="Item name"
              helptext="Short item name"
            />
            <TextArea
              id="item_description"
              v-model="formDemand.item_description"
              :errors="formDemand.errors"
              label="Item description"
            />
          </div>
          <div class="card-body">
            <TextInput
              id="owner_name"
              v-model="formDemand.owner_name"
              :errors="formDemand.errors"
              label="Your name"
            />
            <TextInput
              id="owner_email"
              v-model="formDemand.owner_email"
              :errors="formDemand.errors"
              label="Your email"
            />
            <TextInput
              id="owner_phone"
              v-model="formDemand.owner_phone"
              :errors="formDemand.errors"
              label="Your phone (only numbers)"
            />
          </div>
          <div class="card-footer">
            <PrimaryButton :disabled="formDemand.processing">
              {{ $t('Submit new demand') }}
            </PrimaryButton>
          </div>
        </form>
      </div>
    </div>
    <!--right column-->
    <div class="col">
      <div class="card text-bg-dark">
        <div class="card-header">
          <h2 class="text-center">
            {{ $t('Register broken equipment') }}
          </h2>
        </div>
        <form
          @submit.prevent="
            formRepair.post(route('repair.store'), {
              onSuccess: () => formRepair.reset(),
            })
          "
        >
          <div class="card-body">
            <TextInput
              id="fault_name"
              v-model="formRepair.fault_name"
              :errors="formRepair.errors"
              label="Fault name"
              helptext="Broken equipment name like: phone, laptop, etc."
            />
            <TextArea
              id="fault_description"
              v-model="formRepair.fault_description"
              :errors="formRepair.errors"
              label="Broken item fault description"
              placeholder="Short description what is not good with device or not working."
            />
            <TextInput
              id="fault_inv"
              v-model="formRepair.fault_inv"
              :errors="formRepair.errors"
              label="Item INV number"
              helptext="Item INV-xxxxx number from the label if exists."
            />
          </div>
          <div class="card-body">
            <TextInput
              id="owner_name"
              v-model="formRepair.owner_name"
              :errors="formRepair.errors"
              label="Your name"
            />
            <TextInput
              id="owner_email"
              v-model="formRepair.owner_email"
              :errors="formRepair.errors"
              label="Your email"
            />
            <TextInput
              id="owner_phone"
              v-model="formRepair.owner_phone"
              :errors="formRepair.errors"
              label="Your phone (only numbers)"
            />
          </div>
          <div class="card-footer">
            <PrimaryButton :disabled="formRepair.processing">
              {{ $t('Register for inspection') }}
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
        Register
      </Link>

      <template v-if="canLogin">
        <Link
          v-if="$page.props.auth.user"
          :href="route('dashboard')"
          class="btn btn-outline-primary"
        >
          {{ $t('Dashboard') }}
        </Link>
        <Link
          v-else
          :href="route('login')"
          class="btn btn-outline-primary"
        >
          {{ $t('Log in') }}
        </Link>
      </template>
    </div>
  </div>
</template>
