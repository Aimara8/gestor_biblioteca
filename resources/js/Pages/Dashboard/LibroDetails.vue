<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

// Inertia te da los datos del backend
const page = usePage()
const libro = computed(() => page.props.libro)
</script>

<template>
  <Head title="Detalles del Libro" />
  <AuthenticatedLayout>
    <v-container class="max-w-md py-6">
      <v-card elevation="8" class="rounded-lg">
        <v-card-title class="bg-blue-darken-2 white--text pa-4">
          <v-icon color="white" class="mr-2">mdi-book-open-page-variant</v-icon>
          <span class="text-h6">Detalles del Libro</span>
        </v-card-title>

        <v-card-text v-if="libro" class="pa-4">
          <v-list>
            <v-list-item>
              <v-list-item-title class="font-semibold">Título:</v-list-item-title>
              <v-list-item-subtitle>{{ libro.titulo }}</v-list-item-subtitle>
            </v-list-item>

            <v-list-item>
              <v-list-item-title class="font-semibold">Autor:</v-list-item-title>
              <v-list-item-subtitle>{{ libro.autor }}</v-list-item-subtitle>
            </v-list-item>

            <v-list-item>
              <v-list-item-title class="font-semibold">Género:</v-list-item-title>
              <v-list-item-subtitle>{{ libro.genero }}</v-list-item-subtitle>
            </v-list-item>

            <v-list-item>
              <v-list-item-title class="font-semibold">Editorial:</v-list-item-title>
              <v-list-item-subtitle>{{ libro.editorial }}</v-list-item-subtitle>
            </v-list-item>

            <v-list-item>
              <v-list-item-title class="font-semibold">Publicación:</v-list-item-title>
              <v-list-item-subtitle>
                {{ new Date(libro.fecha_publicacion).toLocaleDateString('es-ES') }}
              </v-list-item-subtitle>
            </v-list-item>

            <v-list-item>
              <v-list-item-title class="font-semibold">ISBN:</v-list-item-title>
              <v-list-item-subtitle>{{ libro.isbn }}</v-list-item-subtitle>
            </v-list-item>
          </v-list>
        </v-card-text>

        <v-card-actions class="pa-4 justify-end">
          <v-btn
            color="primary"
            prepend-icon="mdi-arrow-left"
            :to="route('libros.index')"
          >
            Volver
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-container>
  </AuthenticatedLayout>
</template>
