<script setup lang="ts">
import { ref, computed } from 'vue';

const inputText = ref('');

const characterCount = computed(() => inputText.value.length);
</script>

<template>
    <h1>Mensaje: {{ inputText }}</h1>
    <label for="textInput">Escribe algo:</label>
    <input id="textInput" v-model="inputText" type="text" />

    
    <p>Longintud del mensaje: {{ characterCount }}</p>

</template>

<style scoped>

</style>