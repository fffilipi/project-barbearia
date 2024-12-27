<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import AddEmployees from '@/Pages/AddEmployees.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Funcionários" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Funcionários
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        <AddEmployees />
                    </div>
                    <!-- TODO: Add funcionários list here -->

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
