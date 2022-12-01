<script setup>
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    href: {

    },
    classes: {
        type: String,
        default: 'btn-outline-primary'
    }
});

</script>

<template>
  <Link
    :href="href"
    class="btn me-2"
    :class="classes"
  >
    <slot />
  </Link>
</template>
