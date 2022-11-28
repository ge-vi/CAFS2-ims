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
    class="btn btn-outline-primary"
  >
    <slot />
  </button>
</template>
