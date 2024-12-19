<script setup lang="ts">
import { ref } from 'vue';

const items = ref<string[]>([]);

const newItem = ref('');

const addItem = () => {
  if (newItem.value.trim() !== '') {
    items.value.push(newItem.value.trim());
    newItem.value = ''; 
  }
};
const clearItems = () => {
  items.value = [];
};
</script>

<template>
  <div>
    <h2>Lista de Elementos</h2>
    <input v-model="newItem" type="text" placeholder="Añadir nuevo elemento" />
    <button @click="addItem">Añadir</button>
    <button @click="clearItems" :disabled="items.length === 0">Eliminar Todos</button>
    <ul v-if="items.length > 0">
      <li v-for="(item, index) in items" :key="index">{{ item }}</li>
    </ul>
    <p v-else>No hay elementos.</p>
  </div>
</template>

<style scoped>

</style>