export default {
  name: 'IndexV1',
  data() {
    return {
      error: false,
      todos: [
        {text: "Aprender HTML", done: false},
        {text: "Aprender CSS", done: false},
        {text: "Aprender JS", done: false},
        {text: "Aprender JQuery", done: false},
        {text: "Aprender BootStrap", done: false},
        {text: "Aprender Vue JS", done: false},
        {text: "Aprender Angular JS", done: false},
        {text: "Aprender React JS", done: false},
        {text: "Aprender Node JS", done: false},
        {text: "Aprender PHP", done: false},
        {text: "Aprender Laravel", done: false},
        {text: "Aprender Symfony", done: false},
        {text: "Aprender CodeIgniter", done: false},
        {text: "Aprender Node JS", done: false},
        {text: "Aprender Phyton", done: false},
        {text: "Aprender MySql", done: false},
      ]
    }
  },
  methods: {
    toggle(todo){
      if(todo.done == false){
        alert('Deseja atualizar para concluida a tarefa ' + todo.text + ' ?');
      }else{
        alert('Deseja atualizar para pendente a tarefa ' + todo.text + ' ?');
      }
      todo.done = !todo.done;
      if(todo.done == true){
        this.$swal({
          position: 'top-end',
          icon: 'success',
          title: 'Tarefa concluida com sucesso.',
          showConfirmButton: false,
          timer: 1500
        })
      }else{
        alert('tarefa pendente.');
      }
    },
    add(todo){
      if(todo){
        alert('deseja adicionar a tarefa : '+ todo)
        this.error = false;
        this.todos.push({text: todo, done: false})
        this.todo = "";
        alert('tarefa adicionada com sucesso.');
      } else {
        this.error = true;
        alert('Não identificado informação válida para adicionar a lista.');
      }
    },
    del(index){
      var lista = this.todos;
      let item = lista[index].text;

      const swalWithBootstrapButtons = this.$swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "Deseja remover a tarefa " + item + " ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Deletar Tarefa',
        cancelButtonText: 'Cancelar',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          swalWithBootstrapButtons.fire(
            'Deleted!',
            'Tarefa <b>' + item + '</b> removida',
            'success'
          )
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Tarefa não deletada! ',
            'error'
          )
        }
      })


      //alert("deseja remover a tarefa "+ item + " ?");
      lista.splice(index, 1);
      this.todos = lista
        //alert('removido a tarefa ' + item);
    }
  },
}