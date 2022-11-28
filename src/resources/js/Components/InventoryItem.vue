<script setup>
import { useForm, Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';

const props = defineProps(['item']);
</script>

<template>
  <div class="col gy-3">
    <div class="card shadow">
      <div class="card-header d-flex justify-content-between">
        <h3>
          <small class="text-muted">item type:<br></small>{{ item?.type.name }}
        </h3>

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
              >Edit item</a>
            </li>

            <li>
              <Link
                class="dropdown-item text-danger"
                :href="route('items.destroy', item.id)"
                method="delete"
                title="Delete this item"
              >
                Delete this item
              </Link>
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
          <small class="text-muted">owner's name<br></small>{{ item?.owner.name }}
        </li>
        <li class="list-group-item">
          <small class="text-muted">owner email:<br></small>{{ item?.owner.email }}
        </li>
      </ul>
    </div>
  </div>
</template>
