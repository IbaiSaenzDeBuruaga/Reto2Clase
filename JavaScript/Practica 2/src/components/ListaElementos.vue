<script lang="ts">
import { defineComponent } from 'vue';
import type { PropType } from 'vue';

export default defineComponent({
  name: 'ListaElementos',
  props: {
    elementos: {
      type: Array as PropType<string[]>,
      required: true
    }
  },
  emits: ['eliminar'],
  setup(props, { emit }) {
    const eliminarElemento = (index: number) => {
      emit('eliminar', index);
    };

    return {
      eliminarElemento
    };
  }
});
</script>

<template>
    <div>
      <ul>
        <li v-for="(elemento, index) in elementos" :key="index">
          {{ elemento }}
          <button @click="eliminarElemento(index)">Eliminar</button>
        </li>
      </ul>
    </div>
  </template>
  
  <style scoped>
  ul {
    list-style-type: none;
    padding: 0;
  }
  
  li {
    margin: 5px 0;
  }
  
  button {
    margin-left: 10px;
    cursor: pointer;
  }
  </style>