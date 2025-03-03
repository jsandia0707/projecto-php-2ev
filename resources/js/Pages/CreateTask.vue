<template>
  <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
    <h2 class="text-3xl font-semibold mb-6 text-gray-800">Crear Tarea</h2>

    <form @submit.prevent="submit">
      <div class="mb-4">
        <label for="id_cliente" class="block text-gray-700 font-semibold">ID Cliente</label>
        <input v-model="form.id_cliente" type="text" id="id_cliente" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <span v-if="form.errors.id_cliente" class="text-red-500 text-sm">{{ form.errors.id_cliente }}</span>
      </div>

      <div class="mb-4">
        <label for="persona_contacto" class="block text-gray-700 font-semibold">Persona de Contacto</label>
        <input v-model="form.persona_contacto" type="text" id="persona_contacto" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <span v-if="form.errors.persona_contacto" class="text-red-500 text-sm">{{ form.errors.persona_contacto }}</span>
      </div>

      <div class="mb-4">
        <label for="descripcion" class="block text-gray-700 font-semibold">Descripción</label>
        <textarea v-model="form.descripcion" id="descripcion" class="form-textarea mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
        <span v-if="form.errors.descripcion" class="text-red-500 text-sm">{{ form.errors.descripcion }}</span>
      </div>

      <div class="mb-4">
        <label for="correo_contacto" class="block text-gray-700 font-semibold">Correo de Contacto</label>
        <input v-model="form.correo_contacto" type="email" id="correo_contacto" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <span v-if="form.errors.correo_contacto" class="text-red-500 text-sm">{{ form.errors.correo_contacto }}</span>
      </div>

      <div class="mb-4">
        <label for="direccion" class="block text-gray-700 font-semibold">Dirección</label>
        <input v-model="form.direccion" type="text" id="direccion" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <span v-if="form.errors.direccion" class="text-red-500 text-sm">{{ form.errors.direccion }}</span>
      </div>

      <div class="mb-4">
        <label for="poblacion" class="block text-gray-700 font-semibold">Población</label>
        <input v-model="form.poblacion" type="text" id="poblacion" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <span v-if="form.errors.poblacion" class="text-red-500 text-sm">{{ form.errors.poblacion }}</span>
      </div>

      <div class="mb-4">
        <label for="codigo_postal" class="block text-gray-700 font-semibold">Código Postal</label>
        <input v-model="form.codigo_postal" type="text" id="codigo_postal" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <span v-if="form.errors.codigo_postal" class="text-red-500 text-sm">{{ form.errors.codigo_postal }}</span>
      </div>

      <div class="mb-4">
        <label for="provincia" class="block text-gray-700 font-semibold">Provincia</label>
        <input v-model="form.provincia" type="text" id="provincia" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <span v-if="form.errors.provincia" class="text-red-500 text-sm">{{ form.errors.provincia }}</span>
      </div>

      <div class="mb-4">
        <label for="anotaciones_antes" class="block text-gray-700 font-semibold">Anotaciones Anteriores</label>
        <textarea v-model="form.anotaciones_antes" id="anotaciones_antes" class="form-textarea mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
        <span v-if="form.errors.anotaciones_antes" class="text-red-500 text-sm">{{ form.errors.anotaciones_antes }}</span>
      </div>

      <div class="flex justify-end">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg transition duration-300 ease-in-out">
          Crear Tarea
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import { ref } from 'vue'
import { useForm } from '@inertiajs/inertia-vue3'

export default {
  setup() {
    const form = useForm({
      id_cliente: '',
      persona_contacto: '',
      descripcion: '',
      correo_contacto: '',
      direccion: '',
      poblacion: '',
      codigo_postal: '',
      provincia: '',
      anotaciones_antes: '',
    })

    const submit = () => {
      form.post('/proyecto-2ev/public/create-task')
      console.log('pepe')
    }

    return { form, submit }
  },
}
</script>