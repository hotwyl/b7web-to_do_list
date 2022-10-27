export default {
  name: 'IndexPage',
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
      todo.done = !todo.done;
    },
    add(todo){
      if(todo){
        this.error = false;
        this.todos.push({text: todo, done: false})
        this.todo = "";
      } else {
        this.error = true;
      }
    }
  },
}
