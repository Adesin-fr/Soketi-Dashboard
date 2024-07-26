<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link, useForm} from '@inertiajs/vue3';
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {compile, computed} from "vue";

const form = useForm({
    name: '',
});

const canSave = computed(() => {
    return !form.processing && form.name;
})

const submit = () => {
    form.post(route('apps.store'), {
        preserveScroll: true,
    });
}

</script>

<template>
    <AppLayout title="New App">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create a New App
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">

                    <form @submit.prevent="submit">
                        <div class="mt-2">
                            <InputLabel for="name" value="Name"/>
                            <TextInput
                                    id="name"
                                    v-model="form.name"
                                    class="mt-1 block w-full"
                                    required
                                    autofocus
                            />
                            <InputError :message="form.errors.name" class="mt-2"/>
                        </div>

                        <div class="mt-2 flex justify-end">
                            <primary-button type="submit" :disabled="!canSave">Create App</primary-button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
