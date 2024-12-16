<script setup lang="ts">
import {ref, reactive, computed} from "vue"
const nombre = ref("Sapopeta");
nombre.value = "za, estas loco";

const objetouno = reactive({
  atributo1 : 1,
  atributo2 : 2,
  atributo3 : 3,
}
)
objetouno.atributo2 = 3;

const propiedad = computed(() => { 
  if (objetouno.atributo2 % 2){
    return "El valor es par";
  } else {
    return "El valor es impar";
  }
})
</script>

<template>
  <h1>hola {{nombre}}</h1>
  <h1>{{objetouno.atributo2}}</h1>
  <h1>{{propiedad.valueOf}}</h1>
</template>

<style scoped>
h1 {
  font-family: Arial, sans-serif;
  color: #333;
  font-size: 2rem;
  text-align: center;
  margin-top: 2rem;
  padding: 1rem;
  background-color: #FFD1DC; /* Rosa pastel */
  border-radius: 60px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  transition: box-shadow 0.3s ease; /* Transición suave para el efecto hover */
}

h1:hover {
  box-shadow: 0 0 15px #FF69B4; /* Rosa neón */
}
</style>
