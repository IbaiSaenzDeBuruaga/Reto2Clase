<script setup lang="ts">
import { ref } from 'vue';
import ListaElementos from './components/ListaElementos.vue';
import RegistroForm from './components/RegistroForm.vue';

// Define la lista de elementos
const elementos = ref<string[]>(['Elemento 1', 'Elemento 2', 'Elemento 3']);

// Maneja el evento de eliminación
const manejarEliminacion = (index: number) => {
  elementos.value.splice(index, 1);
};

// Maneja el evento de registro exitoso
const manejarRegistroExitoso = (datos: { nombre: string; correo: string; contrasena: string }) => {
  console.log('Registro exitoso:', datos);
  // Aquí puedes agregar lógica adicional, como agregar el nuevo usuario a una lista
};
</script>

<template>
  <div>
    <h1>{{ elementos.length === 0 ? 'Gestión de Elementos vacía' : 'Gestión de Elementos' }}</h1>
    <ListaElementos :elementos="elementos" @eliminar="manejarEliminacion" />
    <RegistroForm @registroExitoso="manejarRegistroExitoso" />
  </div>
</template>

<style scoped>
h1 {
  text-align: center;
  margin-bottom: 20px;
}
</style>