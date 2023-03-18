<script setup>
import {router} from '@inertiajs/vue3';
import SimpleCard from "@/Components/BS/SimpleCard.vue";

const props = defineProps(['item']);

const deleteItem = () => {
  router.delete(
    route('items.destroy', props.item.id),
    {
    onBefore: () => confirm('Are you sure you want to delete this item?'),
  });
};
const editItem = () => {
  router.get(route('items.edit', props.item.id));
};
</script>

<template>
  <div class="col gy-3">
    <SimpleCard>
      <template #header>
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
      </template>

      <template #body>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <small class="text-muted">inv:<br></small>
            {{ props.item.inv }}
          </li>
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
      </template>

    </SimpleCard>
  </div>
  <!--col-->
</template>
