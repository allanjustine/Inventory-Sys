<template layout="default">

    <h1>Create User</h1>
    <hr>

    <div class="w-[500px] shadow p-4 ">
        <form @submit.prevent="submit">
            <div clas="mb-3">
                <label for="username">User Name</label>
                <input v-model="form.username" type="text" class="field" id="username">
                <div class="text-sm text-red-500 italic" v-if="form.errors.username">{{ form.errors.username }}</div>
            </div>
            <div clas="mb-3">
                <label for="password">Password</label>
                <input v-model="form.password" type="password" class="field" id="password">
                <div class="text-sm text-red-500 italic" v-if="form.errors.password">{{ form.errors.password }}</div>
            </div>
            <div class="mb-3">
                <label for="fullname">Full Name</label>
                <input v-model="form.fullname" type="text" class="field" id="fullname">
                <div class="text-sm text-red-500 italic" v-if="form.errors.fullname">{{ form.errors.fullname }}</div>
            </div>
            <div class="mb-3">
                <label for="designation">Designation</label>
                <input v-model="form.designation" type="text" class="field" id="designation">
                <div class="text-sm text-red-500 italic" v-if="form.errors.designation">{{ form.errors.designation }}</div>
            </div>
            <div class="mb-3">
                <label for="department">Department</label>
                <input v-model="form.department" type="text" class="field" id="department">
                <div class="text-sm text-red-500 italic" v-if="form.errors.department">{{ form.errors.department }}</div>
            </div>
            <div>
                <button class="btn btn-primary" type="submit">
                    Create User
                </button>
            </div>
        </form>
    </div>

</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

let form = useForm({
    username:'',
    password:'',
    fullname:'',
    designation:'',
    department:''
})

const submit = () => {
    form.post('/users')
}

</script>
