<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';


const $page = usePage();

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template>

        <v-row class="mt-6 ml-4">
            <v-col cols="12" md="6" lg="4">
                <v-card color="primary" class="text-white">
                    <v-card-item>
                        <v-card-title>Número de Libros</v-card-title>
                        <v-card-subtitle>Total de libros registrados en la biblioteca</v-card-subtitle>
                        <v-card-text>
                            {{ $page.props.libros.data.length }}
                        </v-card-text>
                    </v-card-item>
                </v-card>
            </v-col>
            <v-col cols="12" md="6" lg="4">
                <v-card>
                    <v-card-item>
                        <v-card-title>xx</v-card-title>
                        <v-card-text>
                        </v-card-text>
                    </v-card-item>
                </v-card>
            </v-col>
        </v-row>
    </AuthenticatedLayout>
</template>
