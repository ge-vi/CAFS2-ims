<script setup>
import { onMounted, ref } from 'vue';

defineProps(['modelValue', 'id', 'label', 'errors']);

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
  if (input.value.hasAttribute('autofocus')) {
    input.value.focus();
  }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
  <div class="mb-3">
    <label :for="id">{{ label }}</label>
    <input
      :id="id"
      ref="input"
      class="form-control"
      :value="modelValue"
      type="date"
      @input="$emit('update:modelValue', $event.target.value)"
    >
    <div
      v-if="errors && errors[id]"
      class="invalid-feedback"
    >
      {{ errors[id] }}
    </div>
  </div>
</template>
