<template>
    <AppLayout>
        <template #content>
            <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Student Form</h2>
        <p class="mb-4">Update a student</p>
      </header>

      <form @submit.prevent="listingStore" enctype="multipart/form-data">

        <div class="mb-6">
          <label for="name" class="inline-block text-lg mb-2"> Name</label>
          <input type="text" v-model="listing.name" class="border border-gray-200 rounded p-2 w-full" name="name" />
        </div>



        <div class="mb-6">
          <label for="image" class="inline-block text-lg mb-2">
            Student Image
          </label>
          <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" />
        </div>

        <div class="mb-6">
          <label for="age" class="inline-block text-lg mb-2">Student Age</label>
          <input type="number" v-model="listing.age" class="border border-gray-200 rounded p-2 w-full" name="age" />
        </div>



        <div class="mb-6">
          <label for="active" class="inline-block text-lg mb-2">
          Status
          </label>
          <br>
          <input type="radio" id="active" name="status" value="1">
            <label for="html">active</label>
            <input type="radio" id="deactive" name="status" value="1">
             <label for="css">deactive</label><br>
        </div>



        <div class="mb-6">
          <button class="bg-black text-white rounded py-2 px-4 hover:bg-black">
            Update Student
          </button>


        </div>
      </form>
        </template>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/App.vue'
import {Link} from '@inertiajs/inertia-vue3'
import axios from 'axios'
export default {
    components: {
        AppLayout, Link
    },
    data() {
      return {
        listing: {
          title: ''
        }
      }
    },

    props: {
        listing: Object
    },
    methods: {
      async listingStore() {
       await axios.put('http://127.0.0.1:8000/student/listings/'+ listing.id, this.listing);
      }

  
    }
   
}
</script>

<style lang="scss" scoped>

</style>