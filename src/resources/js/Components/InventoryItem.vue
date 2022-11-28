<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';

const props = defineProps(['item']);
</script>

<template>
  <pre>{{ item }}</pre>
</template>
