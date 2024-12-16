<template>
    <div>
      <h2>Verificación de Campos</h2>
      <input v-model="firstField" type="text" placeholder="Primer campo" />
      <input v-model="secondField" type="text" placeholder="Segundo campo" />
      <p>{{ message }}</p>
    </div>
  </template>
  
  <script setup lang="ts">
  import { ref, computed } from 'vue';
  
  const firstField = ref('');
  const secondField = ref('');
  
  const message = computed(() => {
    if (firstField.value && secondField.value) {
      return 'Ambos campos están llenos.';
    } else {
      return 'Complete ambos datos.';
    }
  });
  </script>
  
  <style scoped>
  
  </style>