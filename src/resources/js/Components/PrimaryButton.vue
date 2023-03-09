<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
  <button
    :type="type"
    class="btn btn-outline-primary me-2"
  >
    <slot />
  </button>
</template>
