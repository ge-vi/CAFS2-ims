<script setup>
import {Head as InertiaHead, Link} from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    year: {
        default: 2022
    }
});
</script>

<template>
  <InertiaHead title="Welcome" />

  <div class="row text-center">
    <div class="col">
      <p class="py-5">
        Welcome to Inventory Management System
      </p>
    </div>
  </div>

  <div class="row text-center">
    <Link
      v-if="canRegister && !$page.props.auth.user"
      :href="route('register')"
      class="btn btn-outline-primary"
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

  <div class="row text-center">
    <div class="col">
      <p class="py-5">
        {{ Number(year) === 2022 ? year : `2022-${year}` }}
      </p>
    </div>
  </div>
</template>
