<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <div class="row">
    <!--first section-->
    <div class="col d-flex justify-content-center align-items-center">
      <Link href="/">
        <ApplicationLogo class="w-20 h-20" />
      </Link>
    </div>
    <!--second section-->
    <div class="col">
      <slot />
    </div>
  </div>
</template>
