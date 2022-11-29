<script setup>
import { Inertia } from '@inertiajs/inertia';

import { useForm, Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';

const props = defineProps(['item']);

const deleteItem = () => {
    Inertia.delete(route('items.destroy', props.item.id), {
        onBefore: () => confirm('Are you sure you want to delete this item?'),
    });
};
const editItem = () => {
    Inertia.get(route('items.edit', props.item.id));
};

</script>

<template>
  <div class="col gy-3">
    <div class="card shadow">
      <div class="card-header d-flex justify-content-between">
        <span>
          <small class="text-muted">item type:</small><br>
          <h3>
            {{ item?.type?.name }}
          </h3>
        </span>

        <div
          class="btn-group"
          role="group"
        >
          <button
            type="button"
            class="btn btn-primary dropdown-toggle"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            Actions
          </button>
          <ul class="dropdown-menu">
            <li>
              <a
                class="dropdown-item"
                href="#"
                title="Edit this item"
                @click.prevent="editItem"
              >Edit item</a>
            </li>

            <li>
              <a
                class="dropdown-item text-danger"
                href="#"
                title="Delete this item"
                @click.prevent="deleteItem"
              >
                Delete this item
              </a>
            </li>
          </ul>
        </div>
      </div>

      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <small class="text-muted">name:<br></small>
          {{ item?.name }}
        </li>
        <li class="list-group-item">
          <small class="text-muted">description:<br></small>{{ item?.description }}
        </li>
        <li class="list-group-item">
          <small class="text-muted">warranty:<br></small>{{ item?.warranty_months }} months
        </li>
        <li class="list-group-item">
          <small class="text-muted">EOL:<br></small>{{ item?.type?.period - item?.warranty_months }} months
        </li>
        <li class="list-group-item">
          <small class="text-muted">owner's name<br></small>{{ item?.owner?.name }}
        </li>
        <li class="list-group-item">
          <small class="text-muted">owner's email:<br></small>{{ item?.owner?.email }}
        </li>
      </ul>
    </div>
  </div>
</template>
