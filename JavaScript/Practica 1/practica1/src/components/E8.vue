<template>
    <div>
      <h2>Lista de Tareas</h2>
      <ul>
        <li
          v-for="(task, index) in tasks"
          :key="index"
          @dblclick="toggleTaskStatus(index)"
        >
          {{ task.name }} - <span>{{ task.completed ? 'Completada' : 'Pendiente' }}</span>
        </li>
      </ul>
      <p v-if="tasks.length === 0">No hay tareas.</p>
    </div>
  </template>
  
  <script setup lang="ts">
  import { ref } from 'vue';
  
  interface Task {
    name: string;
    completed: boolean;
  }
  
  const tasks = ref<Task[]>([
    { name: 'Tarea 1', completed: false },
    { name: 'Tarea 2', completed: false },
    { name: 'Tarea 3', completed: false },
  ]);
  
  const toggleTaskStatus = (index: number) => {
    if (tasks.value[index].completed) {
      tasks.value.splice(index, 1);
    } else {
      tasks.value[index].completed = true;
    }
  };
  </script>
  
  <style scoped>

  </style>