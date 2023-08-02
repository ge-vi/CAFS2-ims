<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head as InertiaHead } from '@inertiajs/vue3';
import NavButton from '@/Components/BS/NavButton.vue';
import SimpleCard from '@/Components/BS/SimpleCard.vue';
import { trans } from 'laravel-vue-i18n';

defineProps(['owners', 'itemsCount', 'faultsCount', 'typesCount']);
</script>

<template>
  <InertiaHead :title="trans('Dashboard')" />

  <AuthenticatedLayout>
    <template #header> Dashboard </template>

    <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-4">
      <div class="col">
        <SimpleCard>
          <template #header> Owners stats </template>
          <template #body>
            <p>We have {{ owners.count }} owners.</p>
            <p v-if="owners.id" class="m-0">
              Last registered owner is {{ owners.last.name }}.
            </p>
          </template>
          <template #footer>
            <NavButton :href="route('owners.index')"> All owners </NavButton>
          </template>
        </SimpleCard>
      </div>

      <div class="col">
        <SimpleCard>
          <template #header> Items stats </template>
          <template #body>
            <p>We have {{ itemsCount }} items.</p>
          </template>
          <template #footer>
            <NavButton :href="route('items.index')"> All items </NavButton>
          </template>
        </SimpleCard>
      </div>

      <div class="col">
        <SimpleCard>
          <template #header> Types stats </template>
          <template #body>
            <p>We have {{ typesCount }} item types.</p>
          </template>
          <template #footer>
            <NavButton :href="route('types.index')"> All types </NavButton>
          </template>
        </SimpleCard>
      </div>

      <div class="col">
        <SimpleCard>
          <template #header> Repairs stats </template>
          <template #body>
            <p>We have {{ faultsCount }} items for repair.</p>
          </template>
        </SimpleCard>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
