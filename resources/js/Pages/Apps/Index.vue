<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link} from '@inertiajs/vue3';
import AppCard from "@/Pages/Apps/AppCard.vue";

const props=defineProps(['apps'])

</script>

<template>
    <AppLayout title="My Apps">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                My Apps
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">

                    <Link class="primary-button" :href="route('apps.create')">+ Create New App</Link>

                    <div class="flex flex-wrap mt-4">
                        <template v-for="app in apps">
                            <AppCard :app="app" />
                        </template>
                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
