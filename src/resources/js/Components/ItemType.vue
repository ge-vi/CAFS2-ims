<script setup>
import { ref } from 'vue';
import { router, useForm } from '@inertiajs/vue3';
import ButtonLink from '@/Components/BS/ButtonLink.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';

const props = defineProps(['itemType']);

const itemForm = useForm(props.itemType);

const deleteType = () => {
  router.delete(
    route('types.destroy', itemForm), {
      onBefore: () => confirm("Delete item type?")
    });
}

const editing = ref(false);
</script>

<template>
  <div class="col gy-3">
    <div class="card shadow">
      <div class="card-body">
        <p>Type: {{ itemType.name }}</p>
        <p>Life time period: {{ itemType.period }} months</p>
      </div>
      <div class="card-footer">
        <PrimaryButton
          class="btn btn-outline-primary me-2"
          @click="editing = true"
        >
          Edit
        </PrimaryButton>

        <ButtonLink
          as="button"
          href="#"
          class="btn-danger"
          title="Delete this item type"
          @click.prevent="deleteType"
        >
          Delete
        </ButtonLink>
      </div>

      <div
        v-if="editing"
        class="card-footer"
      >
        <form
          @submit.prevent="
            itemForm.put(route('types.update', itemForm.id), {
              onSuccess: () => (editing = false),
            })
          "
        >
          <div class="mb-3">
            <label
              for="type-name"
              class="form-label"
            >Name</label>
            <input
              id="type-name"
              v-model="itemForm.name"
              type="text"
              class="form-control"
            >
            <InputError
              :message="itemForm.errors.name"
              class="form-text"
            />
          </div>

          <div class="mb-3">
            <label
              for="type-period"
              class="form-label"
            >
              Life time period
            </label>
            <input
              id="type-period"
              v-model="itemForm.period"
              type="number"
              class="form-control"
            >
            <InputError
              :message="itemForm.errors.period"
              class="form-text"
            />
          </div>

          <div class="mb-3">
            <PrimaryButton>Save</PrimaryButton>
            <button
              class="btn btn-outline-secondary"
              @click="
                editing = false;
                itemForm.reset();
                itemForm.clearErrors();
              "
            >
              Cancel
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
