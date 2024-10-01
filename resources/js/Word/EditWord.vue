<template>
  <div>
  <div class="rounded-2xl bg-white  w-full     md:w-5/12 px-4 py-8 md:p-8 mx-auto"  >

      <TabGroup  >
        <TabList class="mb-4 border-b border-gray-200  flex flex-wrap -mb-px text-sm font-medium text-center" >
          <Tab as="template" v-slot="{ selected }">
              <tab-btn :selected="selected" >Edit</tab-btn>
          </Tab>
          <Tab as="template" v-slot="{ selected }">
            <tab-btn :selected="selected" > Examples  </tab-btn>
          </Tab>

        </TabList>
        <TabPanels>
          <TabPanel>
            <form  @submit.prevent >
              <input-text v-model:value="word" :name="wordName" />
              <multiselect v-model="value"
                           tag-placeholder="Add this as new tag"
                           placeholder="Search or add a tag"
                           label="name"
                           track-by="id"
                           :options="options"
                           :multiple="true" :taggable="true" @tag="addTag"></multiselect>

              <input-text v-model:value="translation_ru" :name="translationRu" />
              <input-text v-model:value="translation_en" :name="translationEn" />

              <btn-create disabled @click="saveWord" >Save</btn-create>

            </form>
           </TabPanel>
          <TabPanel>
             <edit-examples-form :id="id"
                                 @showSpiner="showSpiner"
                                 @showMessage="showMessage"
                                 @showModalDelete="showModalDelete"
             />
          </TabPanel>
        </TabPanels>
      </TabGroup>




  </div>

        
        <message-success v-model:showMessage="showMessageVal" :flashMessage="flashMessage" />
        <main-spiner v-model:spinerVal="spinerVal"/>



  </div>
</template>

<script>
import axios from 'axios';
import Multiselect from 'vue-multiselect';
import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue';
import EditExamplesForm from './EditExamplesForm.vue';

export default {

  components: {
    Multiselect,
    TabGroup,TabList,Tab,TabPanels,TabPanel, EditExamplesForm
  },

  data() {
    return {

      loaded:true,

      word:'',
      translation_en:'',
      translation_ru:'',


      wordName:'word',
      translationEn:'English translation',
      translationRu:'translation',

     // exampleIdToDelete:'',

      value: [],
      options:[],


     // isOpen:false,
      showMessageVal:false,
      flashMessage:'',

      spinerVal:false,


    }
  },

  props: {
    id:{type:Number }
  },


  methods: {



    async fetchData() {
      try {
        const responce = await axios.get('https://prs3.ru/api/v2/words/'+this.id)
        this.word=responce.data.word
        this.translation_ru=responce.data.translation_ru
        this.translation_en=responce.data.translation_en

        let topics=responce.data.topics
        topics.forEach((item) => {
          this.addTag(item.name)
        });



      }
      catch(e){
        alert("Could not load data")
      }
    },


    async getAllTopics(){

      try{
        const urlTopics='https://prs3.ru/api/v2/topics';
        const responce= await axios.get(urlTopics)
        this.options=responce.data
      }
      catch(e){
        alert("Could not load Topics")
      }

    },


    async fetchUpdateWord() {
      this.spinerVal=true
      try{
        const responce=await axios.put('https://prs3.ru/api/v2/words/'+this.id,{

          word:this.word,
          translation_en:this.translation_en,
          translation_ru:this.translation_ru

        })

       this.word=responce.data.word
       this.translation_ru=responce.data.translation_ru
       this.translation_en=responce.data.translation_en

       this.spinerVal=false
       this.showMessage=true,
       this.flashMessage="Word has been updated"
      }
      catch(e){
        this.spinerVal=false
        alert("Could not UPDATE data")

      }
    },

    addTag (newTag) {
      const tag = {
        name: newTag,
        //id: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
      }
      this.options.push(tag)
      this.value.push(tag)

    },

    showSpiner(showTag){
      this.spinerVal=showTag
    },

    showMessage(message){

      console.log('Edit Form ' + message)
      this.showMessageSuccess()
      this.flashMessage=message
    },

    saveWord(){

      this.fetchUpdateWord()
    },







    showMessageSuccess(){

      this.showMessageVal=true
     //console.log('val=' +this.showMessageVal)
      setTimeout(() => {
        this.showMessageVal = false
      }, 2000)
    },





  },


  mounted() {
    this.getAllTopics()
    this.fetchData()


  }

}
</script>
<style>
 
.wrapper {
  width: 100%;
  min-height: 100vh;
  background-color: #f8f8f8;
  margin: 0;
  padding: 20px;
}

.change__style {
  background-color: #eee;
  font-size: 1em;
  margin-bottom: 10px;
  padding: 5px;
}
</style>