<script setup>
import { onMounted, ref } from 'vue';
import { trans } from 'laravel-vue-i18n';

defineProps([
  'modelValue',
  'id',
  'label',
  'type',
  'helptext',
  'errors'
]);

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
    <label :for="id">{{ trans(label) }}</label>
    <input
      :id="id"
      ref="input"
      class="form-control"
      :value="modelValue"
      :type="type ?? 'text'"
      @input="$emit('update:modelValue', $event.target.value)"
    >
    <div
      v-if="helptext"
      class="form-text"
    >
      {{ trans(helptext) }}
    </div>
    <div
      v-if="errors && errors[id]"
      class="invalid-feedback"
    >
      {{ trans(errors[id]) }}
    </div>
  </div>
</template>
