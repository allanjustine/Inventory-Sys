<template layout>
    <div class="flex justify-between">
        <h1>Members List</h1>
    </div>
    <hr />
    <Link
        href="/members/create"
        class="btn bg-indigo-800 hover:bg-indigo-900 float-right mt-5 mb-4"
        >Add Member</Link
    >
    <div class="py-4">
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Designation</th>
                    <th>Company Member</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="member of members.data" :key="member.id">
                    <td>{{ member.id }}</td>
                    <td>{{ member.last_name }}</td>
                    <td>{{ member.first_name }}</td>
                    <td>{{ member.designation }}</td>
                    <td>{{ member.company.name }}</td>
                    <td>
                        <Link
                            :href="'/members/edit/' + member.id"
                            class="btn bg-sky-600 hover:bg-sky-700"
                        >
                            Edit
                        </Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="flex justify-between">
        <div>Showing <strong>{{ members.data.length }}</strong> entries.</div>
        <nav
            class="isolate inline-flex -space-x-px rounded-md shadow-sm"
            aria-label="Pagination"
        >
            <ul class="pagination">
                <li
                    v-for="page in members.links"
                    :key="page.url"
                    :class="{
                        ' relative z-10 inline-flex items-center text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0':
                            !page.active && page.label !== 'Previous',
                        ' relative z-10 inline-flex items-center text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600':
                            page.active,
                        'opacity-50 cursor-not-allowed relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-300 ring-1 ring-inset ring-gray-300':
                            !page.url && page.label === 'Previous',
                    }"
                >
                    <Link v-if="page.url" :href="page.url" :class="{
                        'cursor-pointer relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0':
                            !page.active && page.label !== 'Previous',
                        'cursor-pointer relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600':
                            page.active,
                        'opacity-50 cursor-not-allowed relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-300 ring-1 ring-inset ring-gray-300':
                            !page.url && page.label === 'Previous',
                    }">
                        <span v-if="page.label.includes('Next')"
                            >Next <i class="fas fa-chevron-right"></i
                        ></span>

                        <span v-else-if="page.label.includes('Previous')">
                            <i class="fas fa-chevron-left"></i> Previous
                        </span>
                        <span v-else class="page-link">{{ page.label }}</span>
                    </Link>
                    <span
                        v-else-if="page.label.includes('Previous')"
                        class="cursor-not-allowed px-4 py-2"
                        ><i class="fas fa-chevron-left"></i> Previous</span
                    >
                    <span v-else class="cursor-not-allowed px-4 py-2">Next <i class="fas fa-chevron-right"></i
                        ></span>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    members: Array,
});
</script>
