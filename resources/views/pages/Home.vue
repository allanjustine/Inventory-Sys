

<template layout>

    <h1 class="text-4xl text-blue-900">Hello World!!!</h1>
    <p class="text-blue-800">
        {{ message }}
    </p>
    <p class="bold text-blue-700">
        Things we'll cover:
    </p>
    <ul>
        <li v-for="topic of topics" v-text="topic"></li>
    </ul>

</template>

<script setup>

import { Link, usePage } from '@inertiajs/inertia-vue3'

const props = defineProps({
    topics:Array
})

const message = "This is a vue page."

const user = usePage().props.auth

console.log(user)

</script>
