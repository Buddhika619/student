<template>
    <nav class="flex justify-between items-center mb-4">
        <Link href="/student"><img class="w-24 logo" src="{{asset('images/logo.png')}}" alt="" />Home</Link>
        <ul class="flex space-x-6 mr-6 text-lg">
            <li>
                <Link href="register.html" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</Link>
            </li>
            <li>
                <Link href="login.html" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login</Link>
            </li>

        </ul>
    </nav>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3'
export default {
    components: {
        Link
    }
}

</script>

<style lang="scss" scoped>

</style>