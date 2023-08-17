/*
Para este ejemplo necesitamos un servidor de entorno local
como xampp apache para simular que estamos descargando el
video  remotamente
*/
var data = {
  title:"Reproductor de video con vue",
  repTitle:"Reproducir",
  medio:document.querySelector("#medio"),
  reproducir:document.querySelector("#reproducir"),
  progreso:document.querySelector("#progreso"),
  videoSource:{
    source:"http://tiendas.com/videos/defensa_indiadedama.mp4",
    videoPoster:"http://tiendas.com/videos/img/chess.png"
  },
  maximo:600,
  bucle:null
};
/**
 * Declarando componentes
 * esta forma ya no es utilizada más en Vue3 pero,
 * sirve para aprender rápidamente cosas relevantes
 * del como integrar el tag video en Vue
 */
var VideoComponent = Vue.extend({
  data: function () {
    return data;
  },
  template: `
   <video id="medio" width="720" height="400" preload
     loop :poster="videoSource.videoPoster"> 
    <source :src="videoSource.source"> 
   </video>
  `,
},);
var ButtonPlayComponent = Vue.extend({
  data: function () {
    return data;
  },
  template: `
     <div id="botones"> 
      <button type="button" id="reproducir" @click="presionar()">{{ repTitle }}</button> 
    </div> 
  `,
  methods:{
    presionar(){
      if(!medio.paused && !medio.ended) { 
        medio.pause(); 
        this.repTitle='Reproducir'; 
        window.clearInterval(bucle); 
    }else{ 
        medio.play(); 
        this.repTitle='Pausa'; 
        bucle=setInterval(this.estado, 1000); 
    }
   
    },
    estado(){ 
      if(!medio.ended){ 
       let total=parseInt(medio.currentTime*this.maximo/medio.duration); 
      progreso.style.width=total+'px'; 
      }else{ 
      progreso.style.width='0px'; 
      this.repTitle='Reproducir'; 
      window.clearInterval(bucle); 
      } 
     }
   }
});
var ProgressbarComponent = Vue.extend({
  data: function () {
    return data;
  },
  template:`
    <div id="barra"> 
      <div id="progreso"></div> 
    </div>
  `
});
/**
 * Registrando componentes
 */
Vue.component('video-component', VideoComponent);
Vue.component('button-play-component', ButtonPlayComponent);
Vue.component('progressbar-component', ProgressbarComponent);

new Vue({
  el: '#app',
  data: data
});