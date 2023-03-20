<script setup>
import { Head as InertiaHead, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import ItemType from '@/Components/ItemType.vue';

defineProps(['types']);

const form = useForm({
    name: '',
    period: '',
});
</script>

<template>
  <InertiaHead title="Inventory types" />

  <AuthenticatedLayout>
    <template #header>
      Available items types
    </template>

    <div class="row row-cols-1 row-cols-md-2">
      <ItemType
        v-for="type in types"
        :key="type.id"
        :item-type="type"
      />
    </div>

    <div class="row">
      <div class="col">
        <div class="card my-5 shadow">
          <div class="card-body">
            <div class="card-title">
              <h3 class="h3 text-center my-3">
                Add new item type
              </h3>
            </div>
            <div class="card-text">
              <form
                @submit.prevent="
                  form.post(route('types.store'), {
                    preserveScroll: true,
                    onSuccess: () => form.reset(),
                  })
                "
              >
                <div class="mb-3">
                  <label
                    for="new-type-name"
                    class="form-label"
                  >Inventory type name</label>
                  <input
                    id="new-type-name"
                    v-model="form.name"
                    placeholder="name"
                    type="text"
                    class="form-control"
                  >
                  <InputError
                    :message="form.errors.name"
                    class="form-text"
                  />
                </div>

                <div class="mb-3">
                  <label for="new-type-period">How long it may be used (in
                    months)?</label>
                  <input
                    id="new-type-period"
                    v-model="form.period"
                    placeholder="period"
                    type="number"
                    class="form-control"
                  >
                  <InputError
                    :message="form.errors.period"
                    class="form-text"
                  />
                </div>

                <PrimaryButton>Save</PrimaryButton>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
