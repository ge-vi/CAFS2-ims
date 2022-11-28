<script setup>
import {Head, useForm} from '@inertiajs/inertia-vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import ItemType from '@/Components/ItemType.vue';

defineProps(['types']);

const form = useForm({
    name: '',
    period: ''
});
</script>

<template>
    <Head title="Inventory types"/>

    <AuthenticatedLayout>

        <h3 class="h3 text-center">Available items types</h3>

        <div class="row row-cols-2">
            <ItemType
                v-for="type in types"
                :key="type.id"
                :itemType="type"
            />
        </div>

        <div class="row">
            <div class="col">
                <div class="card my-5">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="h3 text-center mt-2">Add new item type</h3>
                        </div>
                        <div class="card-text">
                            <form @submit.prevent="form.post(route('types.store'), { onSuccess: () => form.reset() })">

                                <div class="mb-3">
                                    <label for="new-type-name" class="form-label">Inventory type name</label>
                                    <input v-model="form.name" placeholder="name" type="text"
                                           id="new-type-name"
                                           class="form-control"/>
                                    <InputError :message="form.errors.name" class="form-text"/>
                                </div>

                                <div class="mb-3">
                                    <label for="new-type-period">How long it may be used (in months)?</label>
                                    <input v-model="form.period" placeholder="period"
                                           type="number"
                                           id="new-type-period" class="form-control"/>
                                    <InputError :message="form.errors.period" class="form-text"/>
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
