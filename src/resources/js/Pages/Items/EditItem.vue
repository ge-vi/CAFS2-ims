<script setup>
import { Head as InertiaHead, router, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import DateInput from '@/Components/DateInput.vue';
import InputOptions from '@/Components/BS/InputOptions.vue';
import ButtonLink from '@/Components/BS/ButtonLink.vue';
import { trans } from 'laravel-vue-i18n';

const props = defineProps(['item', 'owners', 'types']);

const form = useForm(props.item.data);

const deleteItem = () => {
  router.delete(route('items.destroy', form), {
    onBefore: () => confirm('Are you sure you want to delete this item?'),
  });
};
</script>

<template>
  <InertiaHead :title="trans('Edit item')" />

  <AuthenticatedLayout>
    <template #header>
      Edit item: {{ form.inv }}
    </template>

    <div class="card shadow">
      <form 
        @submit.prevent="form.put(route('items.update', form.id))"
      >
        <div class="card-body">
          <TextInput
            id="name"
            v-model="form.name"
            :errors="form.errors"
            input-label="Name"
          />

          <InputOptions
            id="owner_id"
            v-model="form.owner.id"
            :errors="form.errors"
            :options="owners.data"
            input-label="Owner"
          />

          <InputOptions
            id="type_id"
            v-model="form.type.id"
            :errors="form.errors"
            :options="types.data"
            input-label="Type"
          />

          <TextInput
            id="description"
            v-model="form.description"
            :errors="form.errors"
            input-label="Description"
          />
          <DateInput
            id="warranty_start"
            v-model="form.warranty_start"
            :errors="form.errors"
            input-label="Warranty start"
          />
          <TextInput
            id="warranty_months"
            v-model="form.warranty_months"
            :errors="form.errors"
            input-label="Warranty period (in months)"
            type="number"
          />
          <TextInput
            id="warranty_proof"
            v-model="form.warranty_proof"
            :errors="form.errors"
            input-label="Warranty proof"
          />
        </div> <!-- /card-body -->

        <div class="card-footer d-flex justify-content-between">
          <PrimaryButton :disabled="form.processing">
            Update item
          </PrimaryButton>

          <ButtonLink
            as="button"
            href="#"
            class="btn-danger"
            title="Delete this item"
            @click.prevent="deleteItem"
          >
            Delete item
          </ButtonLink>
        </div> <!-- /card-footer -->
      </form>
    </div>
  </AuthenticatedLayout>
</template>
