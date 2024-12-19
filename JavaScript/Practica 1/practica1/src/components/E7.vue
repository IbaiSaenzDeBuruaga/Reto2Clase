<template>
    <div>
      <h2>Contador</h2>
      <button @click="increment">Incrementar</button>
      <button @click="decrement">Decrementar</button>
      <p>Valor del contador: {{ counter }}</p>
      <p>{{ message }}</p>
    </div>
  </template>
  
  <script setup lang="ts">
  import { ref, computed } from 'vue';
  
  const counter = ref(0);
  
  const increment = () => {
    counter.value++;
  };
  
  const decrement = () => {
    counter.value--;
  };
  
  const message = computed(() => {
    if (counter.value > 0) {
      return 'El contador es positivo.';
    } else if (counter.value < 0) {
      return 'El contador es negativo.';
    } else {
      return 'El contador está a cero.';
    }
  });
  </script>
  
  <style scoped>

  </style>