<script setup>
import {trans} from "laravel-vue-i18n";

defineProps([
    'modelValue',
    'options',
    'id',
    'inputLabel',
    'errors'
]);

defineEmits(['update:modelValue']);
</script>

<template>
  <div class="mb-3">
    <label
      class="px-2"
      :for="id"
    >
      {{ trans(inputLabel) }}
    </label>

    <select
      :id="id"
      :value="modelValue"
      class="form-select"
      :name="id"
      @input="$emit('update:modelValue', $event.target.value)"
    >
      <option
        value=""
        disabled
      >
        Select item
      </option>
      <option
        v-for="option in options"
        :key="option.id"
        :value="option.id"
      >
        {{ option.name }}
      </option>
    </select>
    <div
      v-if="errors && errors[id]"
      class="invalid-feedback"
    >
      {{ errors[id] }}
    </div>
  </div>
</template>
