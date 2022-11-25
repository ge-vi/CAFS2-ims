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


    <div class="col g-3">
        <div class="card">
            <div class="card-body">

                <p>Type: {{ itemType.name }}</p>
                <p>Life time period: {{ itemType.period }} months</p>

            </div>
            <div class="card-footer">

                <button class="btn btn-outline-primary mx-2" @click="editing = true">
                    Edit
                </button>

                <DropdownLink as="button" :href="route('types.destroy', itemType.id)" method="delete" class="btn-danger" title="Delete this item type">
                    Delete
                </DropdownLink>
            </div>

            <div class="card-footer" v-if="editing">
                <form @submit.prevent="form.put(route('types.update', itemType.id), { onSuccess: () => editing = false })">
                    <input
                        v-model="form.name"
                        type="text"
                    />
                    <InputError :message="form.errors.name" class="mt-2" />

                    <br>

                    <input
                        v-model="form.period"
                        type="number"
                    />
                    <InputError :message="form.errors.period" class="mt-2" />

                    <div class="space-x-2">
                        <PrimaryButton class="mt-4">Save</PrimaryButton>
                        <button class="mt-4" @click="editing = false; form.reset(); form.clearErrors()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
