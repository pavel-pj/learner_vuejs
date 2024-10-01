<template>
  <div v-if="showCreateExample" @click.stop="hideModalExample" class="top-0 right-0 bottom-0 left-0 flex fixed z-10" style="background:rgba(0,0,0,0.5)" >

    <div @click.stop class="relative p-4 w-full max-w-md max-h-full m-auto z-20">
      <div class="relative bg-white rounded-lg shadow ">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
          <h3 class="text-xl font-semibold text-gray-900  ">
            Create new Example
          </h3>

          <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center  "
                @click="hideModalExample"   >
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>

          </button>
        </div>
          <form @submit.prevent class="p-4">
            <input-text v-model:value="example" :name="exampleLabel" />
            <btn-create @click="createExample">Create</btn-create>
          </form>


      </div>

    </div>



  </div>
</template>

<script>
import axios from 'axios';
export default {


  name:'modal-create-word-example',
  data(){
    return {
      example:'',
      exampleLabel:'example',





    }
  },


  props:{
    showCreateExample:{type:Boolean,default:false},
    id:{type:Number,required:true},

  },
  methods:{


    hideModalExample(){
      this.$emit('update:showCreateExample' , false)

    },


    createExample() {

      this.$emit('showSpiner',true)

      this.hideModalExample()
      this.fetchCreateExample()



    },

    async fetchCreateExample(){

      try{
         const responce=await axios.post('https://prs3.ru/api/v2/examples',{
            word_id:this.id,
            example:this.example
        })

        this.$emit('newExample',responce.data)
        this.$emit('showSpiner',false)
        this.$emit('showMessage','Created' )
        this.example=''



      }
      catch(e){

        alert('Can not create new Example')
      }

    }
  }
}
</script>
 