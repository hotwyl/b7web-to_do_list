<template>
  <div>
    <header></header>
    <main class="container">
      <div class="error" v-if="error">Informe uma descrição</div>
      <h2>Lista de Tarefa</h2>
      <ul>

        <li v-for="todo in todos">

          <input
            v-on:change="toggle(todo)"
            v-bind:checked="todo.done"
            type="checkbox" />
          <del v-if="todo.done">{{ todo.text }}</del>
          <span v-else>{{ todo.text }}</span>

        </li>
      </ul>
      <hr>
      <input v-model="todo" />
      <button @click="add(todo)">Adicionar</button>
    </main>
    <footer></footer>
  </div>
</template>

<script src="./scrypt.js"></script>
<style src="./stylle.css"></style>
