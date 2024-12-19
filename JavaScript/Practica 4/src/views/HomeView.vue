<template>
    <div class="home">
      <h1>Bienvenido a Nuestro Banco Online</h1>
      <div class="login-section">
        <h2>Acceso a banca online</h2>
        <form @submit.prevent="login">
          <label for="identifier">Identificador:</label>
          <input id="identifier" v-model="identifier" type="text" required />
          <label for="password">Contraseña:</label>
          <input id="password" v-model="password" type="password" required />
          <button class="btn" type="submit">Iniciar sesión</button>
        </form>
        <div class="navigation">
          <router-link to="/" class="btn">Home</router-link>
          <router-link to="/consultas" class="btn">Consultas</router-link>
          <router-link to="/transacciones" class="btn">Transacciones</router-link>
        </div>
      </div>
      <div class="announcements">
        <h2>Anuncios</h2>
        <div class="announcement">
          <img src="@/assets/images/ad1.jpg" alt="Anuncio 1">
          <p>¡A partir de los 31 años sin comisiones en tu visa dual sin!</p>

      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'HomeView',
    data() {
      return {
        identifier: '',
        password: '',
      };
    },
    methods: {
      login() {
        // Simulación de autenticación
        if (this.identifier && this.password) {
          // Aquí podrías implementar la lógica real de autenticación, por ejemplo, usando un servicio de autenticación
          console.log("Login attempt with", this.identifier, this.password);
          // Redirige al usuario a la vista de consultas o transacciones tras el login
          this.$router.push('/consultas');
        } else {
          alert('Por favor, introduce tu identificador y contraseña.');
        }
      },
    },
  };
  </script>