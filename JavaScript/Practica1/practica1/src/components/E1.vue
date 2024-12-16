<script setup lang="ts">
import { ref, computed } from 'vue';

const nombre = ref('');
const apellido = ref('');

const fullName = computed(() => `${nombre.value} ${apellido.value}`);
</script>

<template>
 <div>
  <h1>Tu nombre completo es: {{ fullName }}</h1>
    <label for="nombre">Nombre:</label>
    <input id="nombre" v-model="nombre" type="text" />

    <label for="apellido">Apellido:</label>
    <input id="apellido" v-model="apellido" type="text" />

  </div>

</template>

<style scoped>

</style>
