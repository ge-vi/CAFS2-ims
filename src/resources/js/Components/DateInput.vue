<script setup>
import { onMounted, ref } from 'vue';
import {trans} from "laravel-vue-i18n";

defineProps(['modelValue', 'id', 'inputLabel', 'errors']);

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
    <label
      class="px-2"
      :for="id"
    >
      {{ trans(inputLabel) }}
    </label>

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
