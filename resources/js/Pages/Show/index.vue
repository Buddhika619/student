<template>
    <div>
        <AppLayout>
            <template #content>



                <div class="mx-4">
                    <div class="p-10">
                        <div class="flex flex-col items-center justify-center text-center">
                            <img class="w-48 mr-6 mb-6"
                                src="{{listing.image ? asset('storage/' + listing.image) : asset('/images/no-image.png') }}"
                                alt="" />

                            <h3 class="text-2xl mb-2">
                                {{ listing.name }}
                            </h3>
                            <div class="text-xl font-bold mb-4">
                                {{ listing.age }}
                            </div>

                        

                            <div class="border border-gray-200 w-full mb-6">
                                {{listing.status === 1 &&   'active'}}
                            </div>
                    
                        </div>
                    </div>

                    <div class='mt-4  p-2 flex space-x-6'>
                        <a :href="listing.id + `/edit`">
                            <i class="fa-solid fa-pencil"></i>Edit
                        </a>

                   
               

                        <form @submit.prevent="deleteTask(listing.id)">

                            <button class="text-red-500">
                                <i class="fa-solid fa-trash"></i>
                                Delete
                            </button>

                        </form>
                    </div>
                </div>


            </template>
        </AppLayout>

    </div>
</template>

<script>
import AppLayout from '@/Layouts/App.vue'
import { Link } from '@inertiajs/inertia-vue3'
import axios from 'axios';
export default {
    components: {
        AppLayout
    },
    props: {
        listing: Object
    },
    methods: {
        async deleteTask(id) {
            await axios.delete('http://127.0.0.1:8000/student/listings/' + id, id)
        }
    }
}
</script>



<style lang="scss" scoped>

</style>