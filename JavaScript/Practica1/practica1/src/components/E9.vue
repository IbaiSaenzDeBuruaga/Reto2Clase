<template>
    <div>
      <h2>Lista de Mensajes</h2>
      <ul>
        <li v-for="(message, index) in messages" :key="index">
          <span v-if="!message.editing" @click="editMessage(index)">
            {{ message.text }}
          </span>
          <input
            v-else
            v-model="message.text"
            @blur="stopEditing(index)"
            @keyup.enter="stopEditing(index)"
          />
          <button @click="deleteMessage(index)">Eliminar</button>
        </li>
      </ul>
      <p v-if="messages.length === 0">No hay mensajes.</p>
    </div>
  </template>
  
  <script setup lang="ts">
  import { ref } from 'vue';
  
  interface Message {
    text: string;
    editing: boolean;
  }
  
  const messages = ref<Message[]>([
    { text: 'Mensaje 1', editing: false },
    { text: 'Mensaje 2', editing: false },
    { text: 'Mensaje 3', editing: false },
  ]);
  
  const deleteMessage = (index: number) => {
    messages.value.splice(index, 1);
  };
  
  const editMessage = (index: number) => {
    messages.value[index].editing = true;
  };
  
  const stopEditing = (index: number) => {
    messages.value[index].editing = false;
  };
  </script>
  
  <style scoped>

  </style>