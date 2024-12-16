<script setup lang="ts">
import { defineProps } from 'vue';

const props = defineProps<{ productos: { nombre: string; cantidad: number }[] }>();
</script>

<template>
  <ul>
    <li v-for="producto in props.productos" :key="producto.nombre">
      {{ producto.nombre }} - {{ producto.cantidad }}
    </li>
  </ul>
</template>