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
    <div>
        <p>{{ itemType.name }}</p>
        <p>{{ itemType.period }}</p>

        <Dropdown>
            <template #trigger>
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                    </svg>
                </button>
            </template>
            <template #content>
                <button class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:bg-gray-100 transition duration-150 ease-in-out" @click="editing = true">
                    Edit
                </button>
            </template>
        </Dropdown>

        <hr>

        <DropdownLink as="button" :href="route('types.destroy', itemType.id)" method="delete">
            Delete
        </DropdownLink>

        <hr>

        <form v-if="editing" @submit.prevent="form.put(route('types.update', itemType.id), { onSuccess: () => editing = false })">
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
</template>
