<template>
  <div class="rounded-2xl bg-white  w-full     md:w-6/12 px-4 py-8 md:p-8 mx-auto"  >
  <div class="text-stone-700 font-bold text-2xl mb-4 ">Customize you learning</div>



      <form @submit.prevent  >


          <div class="w-4/6">
              <VueSelect :class="{'my-3 py-2.5 ':true}"
                v-model="selected"
                :options="types"
                placeholder="Select type"/>

              <VueSelect v-if="selected==1"
                  v-model="selectedBox"
                  :options="boxes"
                  placeholder="Select box"  />
          </div>

          <div v-if="selectedBox>0">
            <div class="flex items-center my-6 ">
              <input id="link-checkbox" v-model="checkExamples"
                     type="checkbox"
                     value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 ">
              <label for="link-checkbox" class="ms-2 text-sm font-medium text-gray-900 ">
                Translate examples
                  </label>
            </div>



          <btn-create @ckick="createCard" ></btn-create>
          </div>


        </form>

    {{selectedBox}}





  </div>
</template>

<script>
import axios from 'axios';

import VueSelect from "vue3-select-component";

export default {


  components: {
    VueSelect
  },

  data(){
    return {
      types:[
          {label:'Boxes',value:1},
          {label:'Topics',value:2}
      ],


      checkExamples:'',
      allTopics:[],
      boxes:[],
      selected: '',
      selectedBox:0


    }
  },
  methods:{
    async getAllTopics(){

      try{
        const urlTopics='https://prs3.ru/api/v2/topics';
        const responce= await axios.get(urlTopics)
        let topicData=responce.data

        //let topics=responce.data.topics
        //   topicsData.forEach((item) => {
        //      this.allTopics.push(item.name)
       // });




      }
      catch(e){
        alert("Could not load Topics")
      }

    },
    async getAllBoxes(){

      try{

        const responce=await axios.get('https://prs3.ru/api/v2/boxes')
        let boxesData=responce.data
        console.log(boxesData)


           boxesData.forEach((item) => {
             this.boxes.push({label:'Box '+ item.number+ ' ('+item.total+') ',value:item.id} )
           });

      }
      catch(e){
        alert("Could not load Boxes")
      }
    },

    createCard(){

    }


  },

  created() {
    this.getAllTopics()
    this.getAllBoxes()
  }


}
</script>
