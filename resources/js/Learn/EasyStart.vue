<template>
<div >

  <div v-if="isOptionsShow" class=" mx-auto mt-6" >
      <div class="mx-2 md:grid block gap-12  grid-cols-2 mb-12">


        <easy-form

            :items="boxes"
            :info="{type:'box',title:'Boxes',description:'Choose any box  !'}"
            @checkId="checkId"
        >
        </easy-form>
        <easy-form

            :items="topics"
            :info="{type:'topic',title:'Topics',description:'Choose any topic and be closer with its words !'}"
            @checkId="checkId"
        >
        </easy-form>


      </div>
  </div>

  <learn-card v-show="isCardShow" v-model:item="item"
              @nextWord="nextWord"

  />


</div>
</template>

<script>
import axios from 'axios';
export default {



  data(){
    return {

     item:'',


     words:[],



     topics:[],
     boxes:[],

     isCardShow:false,
     isOptionsShow:true

    }
  },
  methods: {
    async getAllTopics(){

      try{

        const responce=await axios.get('https://prs3.ru/api/v2/topics')
        this.topics=responce.data
      }
      catch(e){
        alert("Could not load Topics")
      }

    },

     async getAllBoxes(){

      try{

        const responce=await axios.get('https://prs3.ru/api/v2/boxes')
        this.boxes=responce.data

       // console.log(this.boxes)
      }
      catch(e){
        alert("Could not load Topics")
      }
    },


     async getWordsOfTopic(id){
      console.log('getWordsOfTopic START')

      try{
        const responce=await axios.get('https://prs3.ru/api/v2/words/topic/' + id)

        this.words=responce.data
       // console.log("getWordsOfTopic ")
        console.log(this.words)
        this.item=this.words.pop()
      }
      catch(e){
        alert("Could not load words of topic")
      }
    },

    async getWordsOfBox(id){
      console.log('getWordsOfBox START')
      try {
       const responce=await axios.get('https://prs3.ru/api/v2/words/box/'+id)
        this.words=responce.data
        console.log(this.words)
        this.item=this.words.pop()
      }
      catch(e){
        alert('Cant load words of Box')
      }

    },


    checkId(info){

     // console.log('TYPE= '+ info.type)

      if(info.type==='topic') {
      //  console.log('load words of topic ')
        this.getWordsOfTopic(info.id);
      }
      if(info.type==='box'){
      //  console.log('log words of box ')
        this.getWordsOfBox(info.id)
      }

     // console.log('checkID AFTER')
      this.isCardShow=true
      this.isOptionsShow=false
    },

    nextWord() {

      //console.log('Next word before POP. ID = ' + this.item.id)

      this.item=this.words.pop()

    //  console.log('Next word afet POP. ID =' + this.item.id)




    }
  },

  mounted(){
    this.getAllTopics()
    this.getAllBoxes()
  }

}
</script>
