<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
  <div class="row">

    <div class="col d-flex justify-content-center align-items-center">
      <Link href="/">
        <ApplicationLogo class="w-20 h-20" />
      </Link>
    </div>

    <div class="col">
      <slot />
    </div>
  </div>
</template>
