<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <div class="flex min-h-screen bg-gray-100">
        <!-- Sidebar -->
        <nav class="w-64 bg-[#de9800] border-r border-gray-100 flex flex-col">
            <div class="flex flex-col items-center pt-6">
                <!-- Logo -->
                <Link :href="route('dashboard')">
                <ApplicationLogo class="block h-9 w-auto fill-current text-white" />
                </Link>
            </div>
            <!-- User -->
            <div class="flex items-center justify-center border-b border-amber-600 px-4 py-3">

                <v-card-text class="flex items-center justify-center text-white text-lg font-semibold tracking-wide"
                    style="text-align: center; width: 100%;">
                    <v-icon class="mr-2">mdi-account-circle</v-icon>
                    {{ $page.props.auth.user.name }}
                </v-card-text>

            </div>
            <!-- Navigation Links -->
            <div class="flex-1 flex flex-col space-y-1 px-2 py-4">

                <NavLink :href="route('dashboard')" :active="route().current('dashboard')"
                    class="flex items-center p-1 text-white text-lg border-none hover:bg-amber-700 active:bg-[#b37d00] rounded-md transition-colors focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-2 focus:ring-offset-amber-600">
                    <v-icon class="mr-2">mdi-view-dashboard</v-icon>
                    Dashboard
                </NavLink>

                <NavLink :href="route('libros.index')" :active="route().current('libros.*')"
                    class="flex items-center p-1 text-white text-lg border-none hover:bg-amber-700 active:bg-[#b37d00] rounded-md transition-colors focus:outline-none focus:ring-2 focus:ring-amber-400">
                    <v-icon class="mr-2">mdi-book-open</v-icon>
                    Books
                </NavLink>
                <!-- Puedes agregar más enlaces aquí -->
            </div>

            <!-- Responsive Navigation Links -->
            <div class="mt-auto px-4 pb-4 space-y-2">
                <div
                    class="flex items-center justify-center text-white text-lg font-semibold tracking-wide cursor-pointer">
                    <v-icon>mdi-account-edit</v-icon>
                    <ResponsiveNavLink :href="route('profile.edit')" :active="route().current('profile.edit')"
                        class="text-white text-base border-none pointer-events-none">
                        Profile
                    </ResponsiveNavLink>
                </div>
                <div
                    class="flex items-center justify-center text-white text-lg font-semibold tracking-wide cursor-pointer">
                    <v-icon>mdi-logout</v-icon>
                    <ResponsiveNavLink :href="route('logout')" method="post" as="button"
                        class="text-white text-base border-none pointer-events-none">
                        Logout
                    </ResponsiveNavLink>
                </div>
            </div>
        </nav>
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>
            <!-- Page Content -->
            <main class="flex-1">
                <slot />
            </main>
        </div>
    </div>
</template>
