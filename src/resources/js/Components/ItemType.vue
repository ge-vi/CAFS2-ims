<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import {ref} from 'vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';


const props = defineProps([
    'itemType'
]);

const form = useForm({
    name: props.itemType.name,
    period: props.itemType.period,
});

const editing = ref(false);

</script>

<template>
    <div class="col gy-3">
        <div class="card">
            <div class="card-body">

                <p>Type: {{ itemType.name }}</p>
                <p>Life time period: {{ itemType.period }} months</p>

            </div>
            <div class="card-footer">

                <PrimaryButton class="btn btn-outline-primary me-2" @click="editing = true">
                    Edit
                </PrimaryButton>

                <DropdownLink as="button" :href="route('types.destroy', itemType.id)" method="delete" class="btn-danger" title="Delete this item type">
                    Delete
                </DropdownLink>
            </div>

            <div class="card-footer" v-if="editing">
                <form @submit.prevent="form.put(route('types.update', itemType.id), { onSuccess: () => editing = false })">

                    <div class="mb-3">
                        <label for="type-name" class="form-label">Name</label>
                        <input v-model="form.name" type="text" id="type-name" class="form-control"/>
                        <InputError :message="form.errors.name" class="form-text"/>
                    </div>

                    <div class="mb-3">
                    <label for="type-period" class="form-label">Life time period</label>
                    <input v-model="form.period" type="number" id="type-period" class="form-control"/>
                    <InputError :message="form.errors.period" class="form-text"/>
                    </div>

                    <div class="mb-3">
                        <PrimaryButton>Save</PrimaryButton>
                        <button class="btn btn-outline-secondary" @click="editing = false; form.reset(); form.clearErrors()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
