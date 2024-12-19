<template>
    <div>
      <ul>
        <li v-for="account in accounts" :key="account.number">
          {{ account.number }}
          <button @click="showMovements(account.number)">Ver movimientos</button>
        </li>
      </ul>
      <div v-if="selectedAccount">
        <h2>Movimientos de la cuenta {{ selectedAccount.number }}</h2>
        <ul>
          <li v-for="movement in movements" :key="movement.date">
            {{ movement.date }} - {{ movement.description }} - {{ movement.amount }}
          </li>
        </ul>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        accounts: [
          { number: '123456789', balance: 1000 },
          { number: '987654321', balance: 2000 },
        ],
        selectedAccount: null,
        movements: [],
      };
    },
    methods: {
      showMovements(accountNumber) {
        // Aquí simularías la obtención de movimientos desde un backend o un servicio
        this.selectedAccount = this.accounts.find(account => account.number === accountNumber);
        this.movements = [
          { date: '2024-01-11', description: 'Depósito', amount: 500 },
          { date: '2024-01-12', description: 'Retiro', amount: -200 },
        ];
      },
    },
  };
  </script>