<script setup lang="ts">
import { ref } from 'vue';

const isMessageVisible = ref(false);

const toggleMessage = () => {
  isMessageVisible.value = !isMessageVisible.value;
};
</script>

<template>
  <div>
    <button @click="toggleMessage">
      {{ isMessageVisible ? 'Ocultar Mensaje' : 'Mostrar Mensaje' }}
    </button>
    <p v-if="isMessageVisible">Hola! este es un mensaje</p>
  </div>
</template>

<style scoped>

</style>