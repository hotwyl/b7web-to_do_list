<template>
  <div>

    <Menu />

    <div class="container py-3">

      <div variant="muted"><h2 variant="secondary">Lista de Tarefa</h2></div>

      <b-alert variant="danger" show dismissible fade v-if="error">
        Informe uma descrição.
      </b-alert>

      <hr>

      <b-input-group
        :size="sm"
        class="mb-3"
        prepend="Tarefa"
      >
        <b-form-input v-model="todo"></b-form-input>
        <b-input-group-append>
          <b-button size="sm" text="Adicionar" variant="primary" @click="add(todo)">Adicionar</b-button>
        </b-input-group-append>
      </b-input-group>

      <hr>

      <b-row>
        <b-col
          cols="4" md="4" sm
          v-for="(todo, index) in todos"
          class="px-3"
        >
          <b-input-group class="mb-2">

            <b-input-group-prepend is-text>
              <input
                type="checkbox"
                v-on:change="toggle(todo)"
                v-bind:checked="todo.done"
                aria-label="Checkbox for following text input"
              >
            </b-input-group-prepend>

            <b-form-input aria-label="Text input with checkbox" v-model="todo.text" style="text-decoration: line-through" disabled v-if="todo.done"></b-form-input>

            <b-form-input aria-label="Text input with checkbox" v-model="todo.text" disabled v-else></b-form-input>

            <b-input-group-append>
              <b-button size="sm" text="Button" variant="outline-danger" v-on:click="del(index)">X</b-button>
            </b-input-group-append>

          </b-input-group>

        </b-col>
      </b-row>

    </div>

  </div>

</template>

<script src="./scrypt.js"></script>
<style src="./stylle.css"></style>
