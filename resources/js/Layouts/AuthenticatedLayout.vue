<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="flex min-h-screen bg-gray-100">
        <!-- Sidebar -->
        <nav class="w-64 bg-[#de9800] border-r border-gray-100 flex flex-col">
            <div class="flex flex-col items-center py-6">
                <!-- Logo -->
                <Link :href="route('dashboard')">
                    <ApplicationLogo class="block h-9 w-auto fill-current text-gray-800" />
                </Link>
            </div>
            <!-- Navigation Links -->
            <div class="flex-1 flex flex-col space-y-2 px-4">
                <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                    Dashboard
                </NavLink>
                <NavLink :href="route('libros.index')" :active="route().current('libros.*')">
                    Libros
                </NavLink>
                <!-- Puedes agregar más enlaces aquí -->
            </div>
            <!-- Settings Dropdown -->
            <div class="px-4 py-4 border-t mt-auto">
                <Dropdown align="right" width="48">
                    <template #trigger>
                        <span class="inline-flex rounded-md w-full">
                            <button
                                type="button"
                                class="inline-flex items-center w-full rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none"
                            >
                                {{ $page.props.auth.user.name }}
                                <svg class="-me-0.5 ms-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </span>
                    </template>
                    <template #content>
                        <DropdownLink :href="route('profile.edit')">
                            Profile
                        </DropdownLink>
                        <DropdownLink :href="route('logout')" method="post" as="button">
                            Log Out
                        </DropdownLink>
                    </template>
                </Dropdown>
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
