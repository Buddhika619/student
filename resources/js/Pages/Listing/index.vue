<template>
    <AppLayout>
        <template #content>
            <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">






                <div v-for="listing in listings">
                    <div class="flex">
                        <img class="hidden w-48 mr-6 md:block" src="`storage/${listing.logo}`" alt="iamge" />
                        <div>
                            <h3 class="text-2xl">
                              
                                <Link :href="'student/listings/' + listing.id">{{ listing.id }}</Link>
                            </h3>
                            <div class="text-xl font-bold mb-4">{{ listing.name }}</div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="mt-6 p-4">

            </div>
            <footer
                class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">


                <Link href="student/listings/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Insert
                </Link>
            </footer>
        </template>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/App.vue'
import {Link} from '@inertiajs/inertia-vue3'
export default {
    components: {
        AppLayout, Link
    },
    props: {
        listings: Object
    },
   
}
</script>

<style lang="scss" scoped>

</style>