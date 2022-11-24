<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>

<template>
    <Head title="Welcome"/>

    <div class="row text-center">

        <div v-if="canLogin" class="col-3 offset-3">

            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class=""
            >Dashboard
            </Link
            >

            <template v-else>

                <Link :href="route('login')" class="btn btn-outline-primary">Log in</Link>

                <template v-if="canRegister">
                    <Link
                        :href="route('register')"
                        class="btn btn-outline-primary"
                    >Register
                    </Link
                    >
                </template>
            </template>
        </div>

    </div>
</template>
