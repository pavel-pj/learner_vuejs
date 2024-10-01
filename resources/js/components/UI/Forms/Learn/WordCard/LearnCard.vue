<template>
  <div class=" w-auto md:w-7/12 mx-auto   mt-8 block p-6 pb-6 bg-white border border-gray-200 rounded-lg shadow    ">
    <div class="cursor-pointer"  @click="getHelp">
      <div class="flex flex-row justify-start ">
        <img src="https://gid-pro.ru/storage/light-bulb.png"
             class="w-5 h-5  mr-2">
        <div class="text-m font-semibold text-grey-700">{{hint}}</div>
      </div>
    </div>

    <h5 class="
        mb-24 mt-20 md:mt-24 text-4xl text-center font-medium tracking-wide tracking-tight text-gray-900 ">
      {{ item.word  }}
    </h5>

    <div class=" block md:flex flex-row justify-center  "  >

      <btn-word-card @click="updateDown" :class="{'text-rose-900':true}">No</btn-word-card>
      <btn-word-card @click="updateUp">Yes</btn-word-card>
    </div>
 


    <div class="block text-m">
      <div class="flex">

      </div>
    </div>

  </div>


</template>

<script>
import axios from 'axios';
export default {
  name:'learn-card',
  data(){
    return {

      helpInfo:[],
      hint:'hint'

    }
  },

  props:{

    item: {type:Array,required:false}
  },

  methods: {
    updateUp(){
        if(this.item.box_id < 6 ) {
           this.fetchUpdateWord(this.item.box_id+1)
        }
      this.$emit('nextWord',true)
      this.hint='hint'

    },
    updateDown(){
      if(this.item.box_id > 1 ) {
        this.fetchUpdateWord(this.item.box_id-1)
      }
      this.$emit('nextWord',true)
      this.hint='hint'

    },

     fetchUpdateWord(box_id) {
      try{
        const responce =  axios.put('https://prs3.ru/api/v2/words/box/'+this.item.id ,{
                box_id:box_id,
        })

      }
      catch(e){
        alert("Could not update word's box")
      }
    },

    async fetchGetHelpInfo(){

      console.log('fetchGetHelpInfo word_id=' + this.item.id)
      try{

        const responce=await axios.get('https://prs3.ru/api/v2/words/'+this.item.id)
        let rowData=responce.data
        let examples=rowData.examples

        this.helpInfo=[]

        let textExamples=[]
        examples.forEach( function(elem,num) {
           textExamples.push(elem.example)

       })

        this.helpInfo=textExamples;
        (rowData.translation_en) ? this.helpInfo.unshift(rowData.translation_en) : '';
        (rowData.translation_ru) ? this.helpInfo.unshift(rowData.translation_ru) : '';
        this.hint=this.helpInfo.pop()


      }
      catch(e){
        alert("Could not load help info")
      }


    },

    getHelp(){
        if(this.hint=='hint'){
          this.fetchGetHelpInfo()
        }
        else {
           (this.helpInfo.length>0) ? this.hint=this.helpInfo.pop() : ''
        }
      
    }




  },



  mounted() {
    //this.item=this.words.pop()
    //this.$emit('nextWord',true)


  }
  
}
</script>

<style lang="scss" scoped>

</style>