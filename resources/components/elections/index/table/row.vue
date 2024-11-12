<script setup lang="ts">
const props = defineProps<{}>();

const status = ref("active");
</script>

<template>
    <tr>
        <td class="size-px whitespace-nowrap">
            <div class="ps-6 py-3">
                <label for="hs-at-with-checkboxes-1" class="flex">
                    <input
                        type="checkbox"
                        class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                        id="hs-at-with-checkboxes-1"
                    />
                    <span class="sr-only">Checkbox</span>
                </label>
            </div>
        </td>
        <td class="whitespace-nowrap">
            <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                <div class="flex items-center gap-x-3">
                    <img
                        class="inline-block size-[38px] rounded-full"
                        src="https://images.unsplash.com/photo-1531927557220-a9e23c1e4794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                        alt="Avatar"
                    />
                    <div class="grow">
                        <span
                            class="block text-sm font-semibold text-gray-800 dark:text-gray-200"
                            >General Election 2024</span
                        >
                        <span
                            class="block text-sm text-gray-500 dark:text-gray-500"
                            >komla@yopmail.com</span
                        >
                    </div>
                </div>
            </div>
        </td>
        <td class="h-px w-72 whitespace-nowrap">
            <div class="px-6 py-3">
                <SharedTableStatus status="active" />
            </div>
        </td>
        <td class="size-px whitespace-nowrap text-gray-500">
            <div class="px-6 py-3">3 weeks ago</div>
        </td>
    </tr>
</template>
