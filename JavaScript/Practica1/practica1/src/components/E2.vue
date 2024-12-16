<script setup lang="ts">
import { ref } from 'vue';

const headerClass = ref('header-class');
const paragraphStyle = ref({ color: 'blue', fontSize: '16px' });
const linkHref = ref('https://example.com');
</script>

<template>
  <div>
    <h1 v-bind:class="headerClass">Este es un encabezado con clase dinámica</h1>
    <p v-bind:style="paragraphStyle">Este es un párrafo con estilo dinámico.</p>
    <a v-bind:href="linkHref" target="_blank">Enlace dinámico</a>
  </div>
</template>

<style scoped>

</style>