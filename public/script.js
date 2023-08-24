/*
ahora lo logica del script vue para realizar la 
peticion con fetch javascript y un componente Vue */
var data = {
  value:"",
  romanNumber:"",
  response:"text",
  title:"Parseando numeros romanos",
};

function captureResponse(datos){
  data.romanNumber = datos.roman;
  return data.romanNumber;
}

/**
 * Declarando el componente
 */
var TextComponent = Vue.extend({
  data: function () {
    return data;
  },
  template: `
    <div>
      <input id="romantext" type="text" @input="onInput" class="form-control"/>
      </br>
      <p class="jumbotron">{{ transRomanNumber }}</p>
    </div>
  `,
  methods:{
    onInput(event){
      this.value = event.target.value;
      let url =`http://tiendas.com/process/parseroman.php?romanum=${this.value}`;
      
      fetch(url)
      .then((resp) => resp.json())
      .then(function(data) {
           captureResponse(data);
        });
    },
   
  },
  computed:{
    transRomanNumber:{
      set(val){
        this.romanNumber=val
      },
     get(){
      return this.romanNumber;
     }
    }
   },
});

/**
 * Registrando componentes
 */
Vue.component('text-component', TextComponent);

new Vue({
  el: '#app',
  data: data
});
/*
 el index .html, el script.js y el parseroman.php estaran en
 https://github.com/OseChez/blog-osechez/public/romanparse
*/
