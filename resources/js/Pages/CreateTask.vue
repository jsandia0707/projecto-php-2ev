<template>
  <div class="max-w-2xl mx-auto p-8 bg-gradient-to-br from-blue-50 to-white shadow-2xl rounded-xl">
    <div class="text-center mb-8">
      <h2 class="text-4xl font-extrabold text-gray-800 tracking-tight">Crear Nueva Tarea</h2>
      <p class="text-gray-500 mt-2">Complete todos los campos para registrar la tarea</p>
    </div>

    <div v-if="$page.props.message" class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
      <p class="font-semibold">{{ $page.props.message }}</p>
    </div>

    <form @submit.prevent="submit" class="space-y-6">
      <div class="grid md:grid-cols-2 gap-6">
        <div>
          <label for="id_cliente" class="block text-sm font-medium text-gray-700 mb-2">ID Cliente</label>
          <input 
            v-model="form.id_cliente" 
            type="text" 
            id="id_cliente" 
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 ease-in-out"
            :class="{ 'border-red-500': form.errors.id_cliente }"
          >
          <span v-if="form.errors.id_cliente" class="text-red-500 text-xs mt-1 block">{{ form.errors.id_cliente }}</span>
        </div>

        <div>
          <label for="persona_contacto" class="block text-sm font-medium text-gray-700 mb-2">Persona de Contacto</label>
          <input 
            v-model="form.persona_contacto" 
            type="text" 
            id="persona_contacto" 
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 ease-in-out"
            :class="{ 'border-red-500': form.errors.persona_contacto }"
          >
          <span v-if="form.errors.persona_contacto" class="text-red-500 text-xs mt-1 block">{{ form.errors.persona_contacto }}</span>
        </div>
      </div>

      <div class="grid md:grid-cols-2 gap-6">
        <div>
          <label for="telefono_contacto" class="block text-sm font-medium text-gray-700 mb-2">Teléfono de Contacto</label>
          <input 
            v-model="form.telefono_contacto" 
            type="tel" 
            id="telefono_contacto" 
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 ease-in-out"
            :class="{ 'border-red-500': form.errors.telefono_contacto }"
          >
          <span v-if="form.errors.telefono_contacto" class="text-red-500 text-xs mt-1 block">{{ form.errors.telefono_contacto }}</span>
        </div>

        <div>
          <label for="correo_contacto" class="block text-sm font-medium text-gray-700 mb-2">Correo de Contacto</label>
          <input 
            v-model="form.correo_contacto" 
            type="email" 
            id="correo_contacto" 
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 ease-in-out"
            :class="{ 'border-red-500': form.errors.correo_contacto }"
          >
          <span v-if="form.errors.correo_contacto" class="text-red-500 text-xs mt-1 block">{{ form.errors.correo_contacto }}</span>
        </div>
      </div>

      <div>
        <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">Descripción</label>
        <textarea 
          v-model="form.descripcion" 
          id="descripcion" 
          rows="4" 
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 ease-in-out resize-y"
          :class="{ 'border-red-500': form.errors.descripcion }"
        ></textarea>
        <span v-if="form.errors.descripcion" class="text-red-500 text-xs mt-1 block">{{ form.errors.descripcion }}</span>
      </div>

      <div class="grid md:grid-cols-3 gap-6">
        <div>
          <label for="direccion" class="block text-sm font-medium text-gray-700 mb-2">Dirección</label>
          <input 
            v-model="form.direccion" 
            type="text" 
            id="direccion" 
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 ease-in-out"
            :class="{ 'border-red-500': form.errors.direccion }"
          >
          <span v-if="form.errors.direccion" class="text-red-500 text-xs mt-1 block">{{ form.errors.direccion }}</span>
        </div>

        <div>
          <label for="poblacion" class="block text-sm font-medium text-gray-700 mb-2">Población</label>
          <input 
            v-model="form.poblacion" 
            type="text" 
            id="poblacion" 
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 ease-in-out"
            :class="{ 'border-red-500': form.errors.poblacion }"
          >
          <span v-if="form.errors.poblacion" class="text-red-500 text-xs mt-1 block">{{ form.errors.poblacion }}</span>
        </div>

        <div>
          <label for="codigo_postal" class="block text-sm font-medium text-gray-700 mb-2">Código Postal</label>
          <input 
            v-model="form.codigo_postal" 
            type="text" 
            id="codigo_postal" 
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 ease-in-out"
            :class="{ 'border-red-500': form.errors.codigo_postal }"
          >
          <span v-if="form.errors.codigo_postal" class="text-red-500 text-xs mt-1 block">{{ form.errors.codigo_postal }}</span>
        </div>
      </div>

      <div class="grid md:grid-cols-2 gap-6">
        <div class="mb-4">
        <label for="provincia" class="block text-gray-700 font-semibold">Provincia</label>
        <select v-model="form.provincia" id="provincia" class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          <option value="" disabled>Seleccione una provincia</option>
          <option v-for="provincia in provincias" :key="provincia.cod" :value="provincia.cod">
            {{ provincia.nombre }}
          </option>
        </select>
        <span v-if="form.errors.provincia" class="text-red-500 text-sm">{{ form.errors.provincia }}</span>
      </div>

        <div>
          <label for="anotaciones_antes" class="block text-sm font-medium text-gray-700 mb-2">Anotaciones Anteriores</label>
          <textarea 
            v-model="form.anotaciones_antes" 
            id="anotaciones_antes" 
            rows="4" 
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 ease-in-out resize-y"
            :class="{ 'border-red-500': form.errors.anotaciones_antes }"
          ></textarea>
          <span v-if="form.errors.anotaciones_antes" class="text-red-500 text-xs mt-1 block">{{ form.errors.anotaciones_antes }}</span>
        </div>
      </div>

      <div class="flex justify-end mt-6">
        <button 
          type="submit" 
          class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300 ease-in-out transform hover:-translate-y-1"
        >
          Crear Tarea
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3'

export default {
  name: 'TaskCreationForm',
  props: {
    provincias: {
      type: Array,
      required: true
    },
    errors: {
      type: Object,
      default: () => ({})
    },
    message: {
      type: String,
      default: ''
    }
  },
  setup(props) {
    const form = useForm({
      id_cliente: '',
      persona_contacto: '',
      telefono_contacto: '',
      descripcion: '',
      correo_contacto: '',
      direccion: '',
      poblacion: '',
      codigo_postal: '',
      provincia: '',
      anotaciones_antes: '',
    })

    const submit = () => {
      form.post('/proyecto-2ev/public/create-task', {
        preserveScroll: true,
        onSuccess: () => {
          form.reset();
        },
        onError: () => {
          console.error('Error submitting form', form.errors);
        }
      });
    }

    return { form, submit }
  }
}
</script>