<template>
    <div>
      <h1>Transacciones</h1>
      <select v-model="fromAccount">
        <option v-for="account in accounts" :key="account.number" :value="account.number">
          {{ account.number }}
        </option>
      </select>
      <div>
        <label>
          <input type="radio" v-model="toAccountType" value="myAccount" checked> A una de mis cuentas
        </label>
        <label>
          <input type="radio" v-model="toAccountType" value="otherAccount"> A otra cuenta
        </label>
      </div>
      <div v-if="toAccountType === 'myAccount'">
        <select v-model="toAccount">
          <option v-for="account in accounts" :key="account.number" :value="account.number" :disabled="account.number === fromAccount">
            {{ account.number }}
          </option>
        </select>
      </div>
      <div v-else>
        <input v-model="toAccount" placeholder="Número de cuenta destino" />
      </div>
      <input type="number" v-model="amount" placeholder="Cantidad a transferir" />
      <button @click="transfer">Transferir</button>
    </div>
  </template>
  
  <script>
  import { useUserStore } from '../store/userStore';
  
  export default {
    data() {
      return {
        fromAccount: null,
        toAccountType: 'myAccount',
        toAccount: null,
        amount: null,
      };
    },
    computed: {
      accounts() {
        const userStore = useUserStore();
        return userStore.accounts;
      },
    },
    methods: {
      transfer() {
        const userStore = useUserStore();
        userStore.transfer(this.fromAccount, this.toAccount, this.amount);
        alert('Transferencia realizada');
      },
    },
  };
  </script>