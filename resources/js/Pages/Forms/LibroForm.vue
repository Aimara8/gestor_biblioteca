<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

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
<AuthenticatedLayout>
  <div class="container mx-auto p-6">
    <v-card class="bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-4">Formulario de Libro</h1>
    <form @submit.prevent="submitForm">
      <div class="mb-4">
        <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
        <input v-model="form.titulo" type="text" id="titulo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required />
      </div>
      <div class="mb-4">
        <label for="autor" class="block text-sm font-medium text-gray-700">Autor</label>
        <input v-model="form.autor" type="text" id="autor" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required />
      </div>
      <div class="mb-4">
        <label for="genero" class="block text-sm font-medium text-gray-700">Género</label>
        <input v-model="form.genero" type="text" id="genero" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required />
      </div>
        <div class="mb-4">
            <label for="editorial" class="block text-sm font-medium text-gray-700">Editorial</label>
            <input v-model="form.editorial" type="text" id="editorial" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required />
        </div>
        <div class="mb-4">
            <label for="fecha_publicacion" class="block text-sm font-medium text-gray-700">Fecha de Publicación</label>
            <input v-model="form.fecha_publicacion" type="date" id="fecha_publicacion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required />
        </div>  
        <div class="mb-4">
            <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
            <input v-model="form.isbn" type="text" id="isbn" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required />
        </div>
      <div class="flex justify-end">
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Guardar</button>
      </div>
    </form>
    </v-card>
    </div>
    </AuthenticatedLayout>

</template>