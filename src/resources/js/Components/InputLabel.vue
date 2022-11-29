<script setup>
defineProps(['value']);
</script>

<template>
  <template v-if="value">
    <label>{{ value }}</label>
  </template>
  <template v-else>
    <slot />
  </template>
</template>
