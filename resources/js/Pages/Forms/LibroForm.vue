<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

const menuFecha = ref(false);
const form = useForm({
  titulo: '',
  autor: '',
  genero: '',
  editorial: '',
  fecha_publicacion: '',
  isbn: ''
});

const submitForm = () => {
  form.post(route('libros.store'), {
    onSuccess: () => {
      form.reset();
    },
    onError: (errors) => {
      console.error(errors);
    }
  });
};
</script>

<template>
  <Head title="Añadir Libro" />
  <AuthenticatedLayout>
    <v-container class="max-w-md">
      <v-card elevation="8" class="rounded-lg">
        <!-- Header compacto -->
        <v-card-title class="bg-blue-darken-2 white--text pa-4">
          <v-icon color="white" class="mr-2">mdi-book-plus</v-icon>
          <span class="text-h6">Nuevo Libro</span>
        </v-card-title>

        <v-card-text class="pa-4">
          <v-form @submit.prevent="submitForm" class="mt-2">
            <!-- Campos compactos -->
            <v-text-field
              v-model="form.titulo"
              label="Título"
              prepend-inner-icon="mdi-book"
              variant="outlined"
              density="compact"
              :error-messages="form.errors.titulo"
              class="mb-2"
              required
            ></v-text-field>

            <v-text-field
              v-model="form.autor"
              label="Autor"
              prepend-inner-icon="mdi-account"
              variant="outlined"
              density="compact"
              :error-messages="form.errors.autor"
              class="mb-2"
              required
            ></v-text-field>

            <v-text-field
              v-model="form.genero"
              label="Género"
              prepend-inner-icon="mdi-tag"
              variant="outlined"
              density="compact"
              :error-messages="form.errors.genero"
              class="mb-2"
              required
            ></v-text-field>

            <!-- Fila 3: Editorial y Fecha en línea -->
            <v-row class="mb-2" dense>
              <v-col cols="6">
                <v-text-field
                  v-model="form.editorial"
                  label="Editorial"
                  prepend-inner-icon="mdi-office-building"
                  variant="outlined"
                  density="compact"
                  :error-messages="form.errors.editorial"
                  required
                ></v-text-field>
              </v-col>
              <v-col cols="6">
                <v-menu
                  v-model="menuFecha"
                  :close-on-content-click="false"
                  transition="scale-transition"
                  offset-y
                  min-width="auto"
                >
                  <template v-slot:activator="{ on, attrs }">
                    <v-text-field
                      v-model="form.fecha_publicacion"
                      label="Publicación"
                      prepend-inner-icon="mdi-calendar"
                      readonly
                      variant="outlined"
                      density="compact"
                      v-bind="attrs"
                      v-on="on"
                      :error-messages="form.errors.fecha_publicacion"
                      required
                    ></v-text-field>
                  </template>
                  <v-date-picker
                    v-model="form.fecha_publicacion"
                    no-title
                    scrollable
                    locale="es"
                    @input="menuFecha = false"
                  ></v-date-picker>
                </v-menu>
              </v-col>
            </v-row>

            <v-text-field
              v-model="form.isbn"
              label="ISBN"
              prepend-inner-icon="mdi-barcode"
              variant="outlined"
              density="compact"
              :error-messages="form.errors.isbn"
              class="mb-3"
              required
            ></v-text-field>

            <!-- Botón compacto -->
            <v-card-actions class="pa-0 justify-end">
              <v-btn
                type="submit"
                color="primary"
                size="small"
                :loading="form.processing"
                :disabled="form.processing"
              >
                <v-icon left size="small">mdi-content-save</v-icon>
                Guardar
              </v-btn>
            </v-card-actions>
          </v-form>
        </v-card-text>
      </v-card>
    </v-container>
  </AuthenticatedLayout>
</template>