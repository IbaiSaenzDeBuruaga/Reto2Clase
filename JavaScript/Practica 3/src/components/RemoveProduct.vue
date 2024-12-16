<script setup lang="ts">
import { ref, defineEmits } from 'vue';

const nombreProducto = ref('');
const emitir = defineEmits(['eliminarProducto']);

function eliminar() {
  if (nombreProducto.value.trim() === '') return;
  emitir('eliminarProducto', nombreProducto.value);
  nombreProducto.value = '';
}
</script>

<template>
  <div>
    <input v-model="nombreProducto" placeholder="Nombre del Producto" />
    <button @click="eliminar">Eliminar Producto</button>
  </div>
</template>