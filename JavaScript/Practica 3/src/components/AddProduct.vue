<script setup lang="ts">
import { ref, defineEmits } from 'vue';

const nombreProducto = ref('');
const cantidadProducto = ref(1);

const emitir = defineEmits(['agregarProducto']);

function agregar() {
  if (nombreProducto.value.trim() === '') return;
  emitir('agregarProducto', nombreProducto.value, cantidadProducto.value);
  nombreProducto.value = '';
  cantidadProducto.value = 1;
}
</script>

<template>
  <div>
    <input v-model="nombreProducto" placeholder="Nombre del Producto" />
    <input type="number" v-model="cantidadProducto" min="1" />
    <button @click="agregar">Agregar Producto</button>
  </div>
</template>