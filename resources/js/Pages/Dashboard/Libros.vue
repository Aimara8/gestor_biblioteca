<script setup>
import { ref, computed } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
  libros: {
    type: [Array, Object],
    required: true
  }
});

const librosList = computed(() => props.libros.data ?? props.libros);

const headers = [
  { title: 'ID', value: 'id', align: 'center', width: '80px', sortable: true },
  { title: 'Título', value: 'titulo', align: 'start', sortable: true  },
  { title: 'Autor', value: 'autor', align: 'start', sortable: true  },
  { title: 'Género', value: 'genero', align: 'start', sortable: true  },
  { title: 'Editorial', value: 'editorial', align: 'start', sortable: true  },
  { title: 'Año de publicación', value: 'fecha_publicacion', align: 'center', width: '150px', sortable: true  },
  { title: 'ISBN', value: 'isbn', align: 'start', sortable: true  },
  { title: 'Acciones', value: 'acciones', sortable: false, align: 'center', width: '180px' }
];

console.log(headers)

const deleteLibro = (id) => {
  if (confirm('¿Estás seguro de que deseas eliminar este libro?')) {
    return route('libros.destroy', id);
  }
};

</script>

<template>

  <Head title="Libros" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Books
      </h2>
    </template>
    <v-card flat class="rounded-lg mt-6 mx-4">
      <v-card-title class="d-flex justify-space-between align-center pa-6">
        <v-btn :href="route('libros.create')" color="primary" variant="elevated" prepend-icon="mdi-file-plus"
          size="large">
          Add Book
        </v-btn>
      </v-card-title>

      <v-divider></v-divider>

      <v-card-text class="pa-0">
        <v-data-table :headers="headers" :items="librosList" :items-per-page="10" class="elevation-1" :footer-props="{
          'items-per-page-options': [10, 25, 50, 100],
          'show-current-page': true
        }">
          <template #item.acciones="{ item }">
            <div class="d-flex justify-center">
              <v-tooltip text="Ver detalles" location="top">
                <template v-slot:activator="{ props }">
                  <v-btn v-bind="props" :href="route('libros.show', item.id)" icon="mdi-eye-outline" variant="text"
                    color="info" size="small" class="mx-1" />
                </template>
              </v-tooltip>

              <v-tooltip text="Editar libro" location="top">
                <template v-slot:activator="{ props }">
                  <v-btn v-bind="props" :href="route('libros.edit', item.id)" icon="mdi-pencil-outline" variant="text"
                    color="warning" size="small" class="mx-1" />
                </template>
              </v-tooltip>

              <v-tooltip text="Eliminar libro" location="top">
                <template v-slot:activator="{ props }">
                  <v-btn v-bind="props" @click="deleteLibro(item.id)" icon="mdi-delete-outline" variant="text"
                    color="error" size="small" class="mx-1" />
                </template>
              </v-tooltip>
            </div>
          </template>

          <!-- Formateo de la fecha -->
          <template #item.fecha_publicacion="{ item }">
            {{ item.fecha_publicacion ? item.fecha_publicacion.split('T')[0] : '' }}
          </template>

          <template #no-data>
            <v-alert type="info" class="my-4 mx-4" border="start">
              No se encontraron libros registrados
            </v-alert>
          </template>
        </v-data-table>
      </v-card-text>

      <v-card-actions v-if="props.libros.links" class="justify-center py-4">
        <v-pagination v-model="props.libros.current_page" :length="props.libros.last_page" :total-visible="7"
          active-color="primary" variant="flat"></v-pagination>
      </v-card-actions>
    </v-card>
  </AuthenticatedLayout>
</template>