<script setup>
import { Head as InertiaHead, Link, useForm } from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from "@/Components/TextInput.vue";
import TextArea from "@/Components/BS/TextArea.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    year: {
        default: 2022,
    },
});

const formDemand = useForm({
    item_name: '',
    item_description: '',
    owner_name: '',
    owner_email: '',
    owner_phone: ''
});

const formRepair = useForm({
    // item_name: '',
    // problem_description: '',
    // owner_name: '',
    // owner_email: '',
    // owner_phone: ''
});

</script>

<template>
  <InertiaHead title="Welcome" />

  <div class="row">
    <div class="col">
      <h1 class="h1 text-center py-5">
        Welcome to Inventory Management System
      </h1>
    </div>
  </div>

  <div class="row">
    <!--left column-->
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h2 class="text-center">
            Describe new demand
          </h2>
        </div>
        <form @submit.prevent="formDemand.post(route('demand.store'))">
          <div class="card-body">
            <TextInput
              id="item_name"
              v-model="formDemand.item_name"
              :errors="formDemand.errors"
              label="Item name"
            />
            <TextArea
              id="item_description"
              v-model="formDemand.item_description"
              :errors="formDemand.errors"
              label="Item description"
            />
          </div>
          <div class="card-body text-bg-light">
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
              Submit new demand
            </PrimaryButton>
          </div>
        </form>
      </div>
    </div>
    <!--right column-->
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h2 class="text-center">
            Register broken equipment
          </h2>
        </div>
        <form @submit.prevent="">
          <div class="card-body">
            form2
          </div>
          <div class="card-footer">
            <PrimaryButton :disabled="formRepair.processing">
              Register for inspection
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
          Dashboard
        </Link>
        <Link
          v-else
          :href="route('login')"
          class="btn btn-outline-primary"
        >
          Log in
        </Link>
      </template>
    </div>
  </div>
  <div class="row text-center">
    <div class="col">
      <p class="py-5">
        {{ Number(year) === 2022 ? year : `2022-${year}` }}
      </p>
    </div>
  </div>
</template>
