<template>
  <div>
    <b-navbar type="dark" variant="dark">
      <b-navbar-nav>
        <b-navbar-brand href="#">ToDoList</b-navbar-brand>

        <!-- Navbar dropdowns -->
        <b-nav-item-dropdown text="Versão 1" right>
          <b-dropdown-item href="/v1">Inicio</b-dropdown-item>
        </b-nav-item-dropdown>

        <b-nav-item-dropdown text="Versão 1" right>
          <b-dropdown-item href="/v2/list">Listagem</b-dropdown-item>
          <b-dropdown-item href="/v2/add">Formulário</b-dropdown-item>
          <b-dropdown-item href="/v2/dash" disabled>Dashboard</b-dropdown-item>
          <b-dropdown-item href="/v2/kanban" disabled>Kanban</b-dropdown-item>
        </b-nav-item-dropdown>
      </b-navbar-nav>
    </b-navbar>
  </div>
</template>

<script>
export default {
  name: "Menu"
}
</script>

<style scoped>

</style>
