<template>
    <div>
      <h2>Carrito de Compras</h2>
      <select v-model="selectedProduct">
        <option v-for="product in products" :key="product" :value="product">
          {{ product }}
        </option>
      </select>
      <button @click="addToCart">Añadir al Carrito</button>
  
      <ul>
        <li v-for="(item, index) in cart" :key="index">
          {{ item.name }} - {{ item.quantity }} unidades
          <button @click="increaseQuantity(index)">+</button>
          <button @click="decreaseQuantity(index)">-</button>
          <button @click="removeFromCart(index)">Eliminar</button>
        </li>
      </ul>
      <p v-if="cart.length === 0">El carrito está vacío.</p>
    </div>
  </template>
  
  <script setup lang="ts">
  import { ref } from 'vue';
  
  const products = ref<string[]>(['Producto 1', 'Producto 2', 'Producto 3']);
  const selectedProduct = ref<string>(products.value[0]);
  
  interface CartItem {
    name: string;
    quantity: number;
  }
  
  const cart = ref<CartItem[]>([]);
  
  const addToCart = () => {
    const existingItem = cart.value.find(item => item.name === selectedProduct.value);
    if (existingItem) {
      existingItem.quantity++;
    } else {
      cart.value.push({ name: selectedProduct.value, quantity: 1 });
    }
  };
  
  const increaseQuantity = (index: number) => {
    cart.value[index].quantity++;
  };
  
  const decreaseQuantity = (index: number) => {
    if (cart.value[index].quantity > 1) {
      cart.value[index].quantity--;
    } else {
      cart.value.splice(index, 1);
    }
  };
  
  const removeFromCart = (index: number) => {
    cart.value.splice(index, 1);
  };
  </script>
  
  <style scoped>

  </style>