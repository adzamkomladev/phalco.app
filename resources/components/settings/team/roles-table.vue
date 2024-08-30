<script setup lang="ts">
const props = defineProps<{
    data: App.Data.Settings.Team.RoleData[];
}>();

const flash = useProperty("flash");
</script>
<template>
    <div>
        <Transition name="fade">
            <div
                v-if="flash?.info"
                id="dismiss-alert"
                class="mb-3 hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-50 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500"
                role="alert"
                tabindex="-1"
                aria-labelledby="hs-dismiss-button-label"
            >
                <div class="flex">
                    <div class="shrink-0">
                        <svg
                            class="shrink-0 size-4 mt-0.5"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path
                                d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"
                            ></path>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
                    </div>
                    <div class="ms-2">
                        <h3
                            id="hs-dismiss-button-label"
                            class="text-sm font-medium"
                        >
                            {{ flash?.info }}
                        </h3>
                    </div>
                    <div class="ps-3 ms-auto">
                        <div class="-mx-1.5 -my-1.5">
                            <button
                                type="button"
                                class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:bg-teal-100 dark:bg-transparent dark:text-teal-600 dark:hover:bg-teal-800/50 dark:focus:bg-teal-800/50"
                                data-hs-remove-element="#dismiss-alert"
                            >
                                <span class="sr-only">Dismiss</span>
                                <svg
                                    class="shrink-0 size-4"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </Transition>
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div
                        class="border rounded-lg shadow overflow-hidden dark:border-neutral-700 dark:shadow-gray-900"
                    >
                        <table
                            class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700"
                        >
                            <thead class="bg-gray-50 dark:bg-neutral-700">
                                <tr>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-start text-sm font-bold text-gray-900 dark:text-neutral-400"
                                    >
                                        All Roles
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-400"
                                    ></th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-400"
                                    ></th>
                                </tr>
                            </thead>
                            <tbody
                                class="divide-y divide-gray-200 dark:divide-neutral-700"
                            >
                                <tr v-for="role in props.data" :key="role.id">
                                    <td
                                        class="size-px whitespace-nowrap ps-6 pe-10 py-4 capitalize font-bold"
                                    >
                                        {{ role.name }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"
                                    >
                                        <span
                                            class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500"
                                        >
                                            <svg
                                                class="size-2.5"
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                fill="currentColor"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                                />
                                            </svg>
                                            {{ role.status }}
                                        </span>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex items-center gap-x-2"
                                    >
                                        actions
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
