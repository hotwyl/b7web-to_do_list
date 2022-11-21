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
      if(todo.done == false) {
        this.$swal({
          title: 'Atualização de Tarefa',
          html: 'Deseja atualizar para concluida a tarefa <u><b>' + todo.text + '</b></u> ?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'confirm',
          cancelButtonText: 'cancel'
        }).then((result) => {
          if (result.isConfirmed) {
            this.$swal(
              'Ação Executada!',
              "Trarefa <u><b>" + todo.text + "</b></u> atualizada para <i>concluida</i>.",
              'success'
            )
            todo.done = true
            return
          } else {
            this.$swal(
              'Ação Cancelada!',
              "Trarefa <u><b>" + todo.text + "</b></u> não atualizada.",
              'error'
            )
            todo.done = false
            return
          }
        })
      }else{
          this.$swal({
            title: 'Atualização de Tarefa',
            html: 'Deseja atualizar para pendente a tarefa <u><b>' + todo.text + '</b></u> ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'confirm',
            cancelButtonText: 'cancel'
          }).then((result) => {
            if (result.isConfirmed) {
              this.$swal(
                'Ação Executada!',
                "Trarefa <u><b>" + todo.text + "</b></u> atualizada para <i>pendente</i>.",
                'success'
              )
              todo.done = false
              return
            } else {
              this.$swal(
                'Ação Cancelada!',
                "Trarefa <u><b>" + todo.text + "</b></u> não atualizada.",
                'error'
              )
              todo.done = true
              return
            }
          })
      }
      // if(todo.done == false){
      //   alert('Deseja atualizar para concluida a tarefa ' + todo.text + ' ?');
      // }else{
      //   alert('Deseja atualizar para pendente a tarefa ' + todo.text + ' ?');
      // }
      // todo.done = !todo.done;
      // if(todo.done == true){
      //   this.$swal({
      //     position: 'top-end',
      //     icon: 'success',
      //     html: 'Tarefa concluida com sucesso.',
      //     showConfirmButton: false,
      //     timer: 1500
      //   })
      // }else{
      //   alert('tarefa pendente.');
      // }
    },
    add(todo){
      if(todo){
        this.$swal({
          title: 'Adição de Tarefa',
          html: "Deseja adicionar a tarefa : <b>" + todo + "</b> ?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'confirm',
          cancelButtonText: 'cancel'
        }).then((result) => {
          if (result.isConfirmed) {
            this.$swal(
              'Ação Executada!',
              "Trarefa <u><b>" + todo + "</b></u> adicionada com sucesso.",
              'success'
            )
            this.error = false;
            this.todos.push({text: todo, done: false})
            this.todo = "";
          }else{
            this.$swal(
              'Ação Cancelada!',
              "Trarefa <u><b>" + todo + "</b></u> não adicionada.",
              'error'
            )
          }
        })

        // alert('deseja adicionar a tarefa : '+ todo)
        // this.error = false;
        // this.todos.push({text: todo, done: false})
        // this.todo = "";
        // alert('tarefa adicionada com sucesso.');
      } else {
        this.$swal({
          position: 'top-end',
          icon: 'error',
          html: 'Não identificado informação válida para adicionar a lista.',
          showConfirmButton: false,
          timer: 1500
        })
        this.error = true;
        // alert('Não identificado informação válida para adicionar a lista.');
      }
    },
    del(index){
      var lista = this.todos;
      let item = lista[index].text;

      this.$swal({
        title: 'Exclusão de Tarefa',
        html: "Deseja remover a tarefa <u><b>" + item + "</b></u> ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'confirm',
        cancelButtonText: 'cancel'
      }).then((result) => {
        if (result.isConfirmed) {
          this.$swal(
            'Ação Executada!',
            "Trarefa <u><b>" + item + "</b></u> removida com sucesso.",
            'success'
          )
          lista.splice(index, 1)
          this.todos = lista
        }else{
          this.$swal(
            'Ação Cancelada!',
            "Trarefa <u><b>" + item + "</b></u> não removida.",
            'error'
          )
        }
      })

      // "Deseja remover a tarefa " + item + " ?"
      //alert("deseja remover a tarefa "+ item + " ?");
      //lista.splice(index, 1);
      //this.todos = lista
      //alert('removido a tarefa ' + item);
    }
  },
}
