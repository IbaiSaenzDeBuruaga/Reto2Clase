<script setup lang="ts">
import { ref, onMounted } from 'vue';
import AgregarProducto from './components/AddProduct.vue';
import EliminarProducto from './components/RemoveProduct.vue';
import ListaProductos from './components/ProductList.vue';

const listaCompras = ref<{ nombre: string; cantidad: number }[]>([]);
const mostrarAgregar = ref(true);

onMounted(() => {
  const listaGuardada = localStorage.getItem('listaCompras');
  if (listaGuardada) {
    listaCompras.value = JSON.parse(listaGuardada);
  }
});

function guardarLista() {
  localStorage.setItem('listaCompras', JSON.stringify(listaCompras.value));
}

function agregarProducto(nombre: string, cantidad: number) {
  const productoExistente = listaCompras.value.find(item => item.nombre === nombre);
  if (productoExistente) {
    productoExistente.cantidad += cantidad;
  } else {
    listaCompras.value.push({ nombre, cantidad });
  }
  guardarLista();
}

function eliminarProducto(nombre: string) {
  listaCompras.value = listaCompras.value.filter(item => item.nombre !== nombre);
  guardarLista();
}
</script>

<template>
  <header>
    <h1>Lista de Compras</h1>
    <button @click="mostrarAgregar = true">Añadir Producto</button>
    <button @click="mostrarAgregar = false">Eliminar Producto</button>
  </header>

  <main>
    <component :is="mostrarAgregar ? AgregarProducto : EliminarProducto" 
               @agregarProducto="agregarProducto" 
               @eliminarProducto="eliminarProducto" />
    <ListaProductos :productos="listaCompras" />
  </main>
</template>
<style scoped>

</style>