<template>
    <form @submit.prevent="enviarFormulario">
      <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" v-model="nombre" required />
      </div>
      <div>
        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" v-model="correo" required />
      </div>
      <div>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" v-model="contrasena" required />
      </div>
      <button type="submit">Registrar</button>
      <p v-if="error" class="error">{{ error }}</p>
    </form>
  </template>
  
  <script lang="ts">
  import { defineComponent, ref } from 'vue';
  
  export default defineComponent({
    name: 'RegistroForm',
    emits: ['registroExitoso'],
    setup(_, { emit }) {
      const nombre = ref('');
      const correo = ref('');
      const contrasena = ref('');
      const error = ref('');
  
      const validarCorreo = (correo: string) => {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(correo);
      };
  
      const enviarFormulario = () => {
        if (!nombre.value || !correo.value || !contrasena.value) {
          error.value = 'Todos los campos son obligatorios.';
          return;
        }
  
        if (!validarCorreo(correo.value)) {
          error.value = 'El correo electrónico no es válido.';
          return;
        }
  
        error.value = '';
        emit('registroExitoso', { nombre: nombre.value, correo: correo.value, contrasena: contrasena.value });
      };
  
      return {
        nombre,
        correo,
        contrasena,
        error,
        enviarFormulario
      };
    }
  });
  </script>
  
  <style scoped>
  .error {
    color: red;
    margin-top: 10px;
  }
  </style>