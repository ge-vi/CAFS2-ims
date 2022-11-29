<script setup>
import { onMounted, ref } from 'vue';

defineProps(['modelValue', 'id', 'label', 'rows', 'errors']);

defineEmits(['update:modelValue']);

const textarea = ref(null);

onMounted(() => {
    if (textarea.value.hasAttribute('autofocus')) {
        textarea.value.focus();
    }
});

defineExpose({ focus: () => textarea.value.focus() });
</script>

<template>
  <div class="mb-3">
    <label :for="id">{{ label }}</label>
    <textarea
      :id="id"
      ref="textarea"
      class="form-control"
      :rows="rows ?? 3"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
    />
    <div
      v-if="errors && errors[id]"
      class="invalid-feedback"
    >
      {{ errors[id] }}
    </div>
  </div>
</template>
