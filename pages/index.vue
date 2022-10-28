<template>
  <div>
    <header></header>
    <main class="container">
      <div class="error" v-if="error">Informe uma descrição</div>
      <h2>Lista de Tarefa</h2>
      <hr>
      <input v-model="todo" />
      <button @click="add(todo)">Adicionar</button>
      <hr>
      <ul>

        <li v-for="(todo, index) in todos">

          <input
            v-on:change="toggle(todo)"
            v-bind:checked="todo.done"
            type="checkbox" />
          <del v-if="todo.done">{{ todo.text }}</del>
          <span v-else>{{ todo.text }}</span>
          <b-button size="sm" v-on:click="del(index)">X</b-button>
        </li>
      </ul>

    </main>
    <footer></footer>
  </div>
</template>

<script src="./scrypt.js"></script>
<style src="./stylle.css"></style>
