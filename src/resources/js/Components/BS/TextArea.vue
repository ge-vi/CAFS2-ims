<script setup>
import { onMounted, ref } from 'vue';
import { trans } from 'laravel-vue-i18n';

defineProps([
  'modelValue',
  'id',
  'textareaLabel',
  'textareaPlaceholder',
  'rows',
  'errors'
]);

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
    <label
      class="px-2"
      :for="id"
    >
      {{ trans(textareaLabel) }}
    </label>
    <textarea
      :id="id"
      ref="textarea"
      class="form-control"
      :rows="rows ?? 3"
      :value="modelValue"
      :placeholder="textareaPlaceholder"
      @input="$emit('update:modelValue', $event.target.value)"
    />
    <div
      v-if="errors && errors[id]"
      class="invalid-feedback"
    >
      {{ trans(errors[id]) }}
    </div>
  </div>
</template>
