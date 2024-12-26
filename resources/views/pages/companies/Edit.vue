<template layout="default">
    <div class="container w-[600px] bg-indigo-900 shadow p-10 mx-auto mt-5">
        <h1 class="text-2xl font-bold mb-5 text-white text-center">Edit Company</h1>
        <form @submit.prevent="updateCompany">
            <div class="flex flex-col mb-4">
                <label class="font-bold text-white mb-2" for="name">Company Name:</label>
                <input
                    type="text"
                    id="name"
                    v-model="form.name"
                    class="border py-2 px-3 text-grey-darkest"
                />
                <span v-if="form.errors.name" class="text-red-500">{{
                    form.errors.name
                }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <label class="font-bold text-white mb-2" for="type">Type:</label>
                <select
                    v-model="form.type"
                    name="type"
                    id="type"
                    class="border py-2 px-3 text-grey-darkest"
                >
                    <option selected hidden="true">Select Type</option>
                    <option disabled>Select Type</option>
                    <option value="Public">Public</option>
                    <option value="Private">Private</option>
                </select>
                <span v-if="form.errors.type" class="text-red-500">{{
                    form.errors.type
                }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <label class="font-bold text-white mb-2" for="address">Address:</label>
                <input
                    v-model="form.address"
                    type="text"
                    name="address"
                    id="address"
                    class="border py-2 px-3 text-grey-darkest"
                />
                <span v-if="form.errors.address" class="text-red-500">{{
                    form.errors.address
                }}</span>
            </div>
            <div class="flex flex-col mb-4">
                <label class="font-bold text-white mb-2" for="net_worth">Net Worth:</label>
                <input
                    v-model="form.net_worth"
                    type="number"
                    name="net_worth"
                    id="net_worth"
                    class="border py-2 px-3 text-grey-darkest"
                />
                <span v-if="form.errors.net_worth" class="text-red-500">{{
                    form.errors.net_worth
                }}</span>
            </div>

            <div class="flex items-center justify-between">
                <button
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                >
                    Update Company
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    company: Object,
});

let form = useForm({
    name: props.company.name,
    type: props.company.type,
    address: props.company.address,
    net_worth: props.company.net_worth,
});

const updateCompany = () => {
    Inertia.post(`/companies/${props.company.id}`, {
        _method: "put",
        name: form.name,
        type: form.type,
        address: form.address,
        net_worth: form.net_worth,
    });
};
</script>
