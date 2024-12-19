<template>
    <div>
      <input v-model="id" placeholder="ID" />
      <input type="password" v-model="password" placeholder="Contraseña" />
      <button @click="login">Ingresar</button>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        id: '',
        password: '',
        loggedIn: false,
      };
    },
    methods: {
      login() {
        // Simulación de autenticación
        if (this.id === '12345' && this.password === 'password') {
          this.loggedIn = true;
          this.$router.push('/consultas');
          // Aquí podrías emitir un evento o usar una librería de eventos para notificar a otros componentes
        } else {
          alert('ID o contraseña incorrectos');
        }
      },
    },
  };
  </script>