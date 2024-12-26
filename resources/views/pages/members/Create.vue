<template layout="default">
    <div class="container bg-indigo-900 w-[600px] shadow p-10 mx-auto mt-5">
        <h1 class="text-2xl font-bold mb-5 text-white text-center">
            Create Member
        </h1>
        <form @submit.prevent="add">
            <div class="flex flex-col mb-4">
                <label class="font-bold text-white mb-2" for="first_name"
                    >First Name:</label
                >
                <input
                    type="text"
                    id="first_name"
                    v-model="form.first_name"
                    class="border py-2 px-3 text-grey-darkest"
                />
                <span v-if="form.errors.first_name" class="text-red-500">{{
                    form.errors.first_name
                }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <label class="font-bold text-white mb-2" for="last_name"
                    >Last Name:</label
                >
                <input
                    v-model="form.last_name"
                    type="text"
                    name="last_name"
                    id="last_name"
                    class="border py-2 px-3 text-grey-darkest"
                />
                <span v-if="form.errors.last_name" class="text-red-500">{{
                    form.errors.last_name
                }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <label class="font-bold text-white mb-2" for="designation"
                    >Designation:</label
                >
                <input
                    v-model="form.designation"
                    type="text"
                    name="designation"
                    id="designation"
                    class="border py-2 px-3 text-grey-darkest"
                />
                <span v-if="form.errors.designation" class="text-red-500">{{
                    form.errors.designation
                }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <label class="font-bold text-white mb-2" for="company_id"
                    >Company:</label
                >
                <select
                    v-model="form.company_id"
                    name="company_id"
                    id="company_id"
                    class="border py-2 px-3 text-grey-darkest"
                >
                    <option value="" hidden="true">Select Company</option>
                    <option disabled>Select Company</option>
                    <option
                        v-for="company in companies"
                        :key="company.id"
                        :value="company.id"
                    >
                        {{ company.name }}
                    </option>
                </select>
                <span v-if="form.errors.company_id" class="text-red-500">{{
                    form.errors.company_id
                }}</span>
            </div>

            <div class="flex items-center justify-between">
                <button
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                >
                    Create Member
                </button>

                <button type="reset" class="btn secondary">Clear</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    companies: Object,
});

let form = useForm({
    first_name: "",
    last_name: "",
    designation: "",
    company_id: "",
});

const add = () => {
    form.post("/members");
};
</script>
