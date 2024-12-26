<template layout="default">
    <div class="py-4">
        <div class="w-[450px] bg-indigo-900 border mx-auto border-gray-400 shadow mt-24 p-8 shadow rounded">
            <h1 class="text-4xl mb-5 text-center text-white">User Login</h1>
            <form @submit.prevent="submit">
                <div class="mb-4 flex flex-col">
                    <label class="font-bold text-white" for="username">User Name:</label>
                    <input v-model="form.username" type="text" class="field" />
                    <div
                        class="text-sm text-red-500 italic"
                        v-if="form.errors.username"
                    >
                        {{ form.errors.username }}
                    </div>
                </div>
                <div class="mb-4 flex flex-col">
                    <label class="font-bold text-white" for="password">Password:</label>
                    <input
                        v-model="form.password"
                        type="password"
                        class="field"
                    />
                    <div
                        class="text-sm text-red-500 italic"
                        v-if="form.errors.password"
                    >
                        {{ form.errors.password }}
                    </div>
                </div>
                <div class="mb-4">
                    <button type="submit" class="btn bg-indigo-500 hover:bg-indigo-700">Log In</button>
                </div>
                <div
                    class="text-sm text-red-500 italic"
                    v-if="form.errors.authentication"
                >
                    {{ form.errors.authentication }}
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

let form = useForm({
    username: "",
    password: "",
});

let submit = () => {
    form.post("/login");
};
</script>
