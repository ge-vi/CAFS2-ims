<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InventoryItem from '@/Components/InventoryItem.vue';

defineProps(['items']);
</script>

<template>
  <Head title="Items" />

  <AuthenticatedLayout>
    <h3>Items list</h3>

    <Link :href="route('items.create')">
      Create new item
    </Link>

    <div class="wrappppppp">
      <InventoryItem
        v-for="item in items"
        :key="item.id"
        :item="item"
      />
    </div>
  </AuthenticatedLayout>
</template>
