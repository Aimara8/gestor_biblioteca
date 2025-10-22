<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { useForm, usePage, router, Head } from '@inertiajs/vue3'
import { ref, computed } from 'vue'

const page = usePage()
const libro = computed(() => page.props.libro) // puede ser null si es creación

const menuFecha = ref(false)

const form = useForm({
  titulo: libro.value?.titulo ?? '',
  autor: libro.value?.autor ?? '',
  genero: libro.value?.genero ?? '',
  editorial: libro.value?.editorial ?? '',
  fecha_publicacion: libro.value?.fecha_publicacion ?? '',
  isbn: libro.value?.isbn ?? '',
})

// Detecta si es edición o creación
const esEdicion = computed(() => !!libro.value)

// Enviar formulario
const submitForm = () => {
  if (esEdicion.value) {
    form.put(route('libros.update', libro.value.id), {
      onSuccess: () => form.reset(),
    })
  } else {
    form.post(route('libros.store'), {
      onSuccess: () => form.reset(),
    })
  }
}

const formatDate = (date) => {
  if (!date) return ''
  const d = new Date(date)
  return `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}-${String(d.getDate()).padStart(2, '0')}`
}
</script>

<template>
  <Head :title="esEdicion ? 'Editar Libro' : 'Añadir Libro'" />
  <AuthenticatedLayout>
    <v-container class="max-w-md py-8">
      <v-card elevation="8" class="rounded-lg">
        <!-- Header -->
        <v-card-title
          class="bg-blue-darken-2 white--text pa-4 d-flex align-center justify-space-between"
        >
          <div class="flex items-center">
            <v-icon color="white" class="mr-2">
              {{ esEdicion ? 'mdi-pencil' : 'mdi-book-plus' }}
            </v-icon>
            <span class="text-h6">
              {{ esEdicion ? 'Editar Libro' : 'Nuevo Libro' }}
            </span>
          </div>
        </v-card-title>

        <v-card-text class="pa-4">
          <v-form @submit.prevent="submitForm">
            <v-text-field
              v-model="form.titulo"
              label="Título"
              prepend-inner-icon="mdi-book"
              variant="outlined"
              density="compact"
              :error-messages="form.errors.titulo"
              class="mb-3"
              required
            />

            <v-text-field
              v-model="form.autor"
              label="Autor"
              prepend-inner-icon="mdi-account"
              variant="outlined"
              density="compact"
              :error-messages="form.errors.autor"
              class="mb-3"
              required
            />

            <v-text-field
              v-model="form.genero"
              label="Género"
              prepend-inner-icon="mdi-tag"
              variant="outlined"
              density="compact"
              :error-messages="form.errors.genero"
              class="mb-3"
              required
            />

            <v-row dense>
              <v-col cols="6">
                <v-text-field
                  v-model="form.editorial"
                  label="Editorial"
                  prepend-inner-icon="mdi-office-building"
                  variant="outlined"
                  density="compact"
                  :error-messages="form.errors.editorial"
                  required
                />
              </v-col>

              <v-col cols="6">
                <v-menu
                  v-model="menuFecha"
                  :close-on-content-click="false"
                  transition="scale-transition"
                  offset-y
                  min-width="auto"
                >
                  <template #activator="{ props }">
                    <v-text-field
                      v-model="form.fecha_publicacion"
                      label="Publicación"
                      prepend-inner-icon="mdi-calendar"
                      readonly
                      variant="outlined"
                      density="compact"
                      v-bind="props"
                      :error-messages="form.errors.fecha_publicacion"
                      required
                    />
                  </template>
                  <v-date-picker
                    v-model="form.fecha_publicacion"
                    locale="es"
                    @update:modelValue="(value) => { 
                      form.fecha_publicacion = formatDate(value)
                      menuFecha = false 
                    }"
                  />
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
            />

            <!-- Botones -->
            <v-card-actions class="pa-0 justify-end mt-3">
              <v-btn
                color="primary"
                type="submit"
                :loading="form.processing"
                :disabled="form.processing"
                prepend-icon="mdi-content-save"
              >
                {{ esEdicion ? 'Actualizar' : 'Guardar' }}
              </v-btn>
            </v-card-actions>
          </v-form>
        </v-card-text>
      </v-card>
    </v-container>
  </AuthenticatedLayout>
</template>
