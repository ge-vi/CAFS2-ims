<script setup>
import { Head as InertiaHead, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InventoryItem from '@/Components/InventoryItem.vue';
import { trans } from 'laravel-vue-i18n';

defineProps(['items']);
</script>

<template>
  <InertiaHead :title="trans('Items list')" />

  <AuthenticatedLayout>
    <template #header>
      Items list
    </template>

    <Link
      :href="route('items.create')"
      class="btn btn-outline-primary"
    >
      Create new item
    </Link>

    <div class="row row-cols-1 row-cols-md-2">
      <InventoryItem
        v-for="item in items.data"
        :key="item.id"
        :item="item"
      />
    </div>
  </AuthenticatedLayout>
</template>
