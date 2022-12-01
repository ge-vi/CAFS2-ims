<script setup>
import {Head as InertiaHead, Link} from '@inertiajs/inertia-vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InventoryItem from '@/Components/InventoryItem.vue';

defineProps(['items']);
</script>

<template>
  <InertiaHead title="Items list" />

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

    <div class="row row-cols-2">
      <InventoryItem
        v-for="item in items"
        :key="item.id"
        :item="item"
      />
    </div>
  </AuthenticatedLayout>
</template>
