<script setup>
import { computed } from 'vue';
import { trans } from 'laravel-vue-i18n';

const emit = defineEmits(['update:checked']);

const props = defineProps({
  labelText: {
    type: String,
    default: null,
  },
  checked: {
    type: [Array, Boolean],
    default: false,
  },
  value: {
    default: null,
  },
});

const proxyChecked = computed({
  get() {
    return props.checked;
  },

  set(val) {
    emit('update:checked', val);
  },
});
</script>

<template>
  <div class="form-check form-switch">
    <input
      id="flexSwitchCheckDefault"
      v-model="proxyChecked"
      :value="value"
      class="form-check-input"
      type="checkbox"
      role="switch"
    />
    <label class="form-check-label" for="flexSwitchCheckDefault">{{
      trans(labelText)
    }}</label>
  </div>
</template>
