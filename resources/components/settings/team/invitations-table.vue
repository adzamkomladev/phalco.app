<script setup lang="ts">
const props = defineProps<{
    data: App.Data.Settings.Team.InvitationData[];
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
                                        Pending invites
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
                                <tr
                                    v-for="invite in props.data"
                                    :key="invite.id"
                                >
                                    <td class="size-px whitespace-nowrap">
                                        <div
                                            class="py-3 ps-6 lg:ps-3 xl:ps-2 pe-6"
                                        >
                                            <div
                                                class="flex items-center gap-x-3"
                                            >
                                                <img
                                                    class="inline-block size-[38px] rounded-full"
                                                    :src="`https://ui-avatars.com/api/?name=${invite.email}`"
                                                    alt="Avatar"
                                                />
                                                <div class="grow">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-gray-200"
                                                    >
                                                        {{ invite.email }}
                                                    </span>
                                                    <span
                                                        class="block text-sm text-gray-500 capitalize font-semibold"
                                                    >
                                                        {{ invite.role?.name }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"
                                    >
                                        {{ invite.expires_at }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex items-center gap-x-2"
                                    >
                                        <router-link
                                            :href="
                                                route(
                                                    'settings.team.invitation.send'
                                                )
                                            "
                                            method="POST"
                                            :data="{
                                                email: invite.email,
                                                role: invite.role,
                                            }"
                                            class="hover:text-teal-500"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="1"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="lucide lucide-rotate-cw"
                                            >
                                                <path
                                                    d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"
                                                />
                                                <path d="M21 3v5h-5" />
                                            </svg>
                                        </router-link>
                                        <router-link
                                            :href="
                                                route(
                                                    'settings.team.invitation.delete',
                                                    { id: invite.id }
                                                )
                                            "
                                            method="DELETE"
                                            class="hover:text-red-500"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="#000000"
                                                stroke-width="1"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="lucide lucide-trash-2"
                                            >
                                                <path d="M3 6h18" />
                                                <path
                                                    d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"
                                                />
                                                <path
                                                    d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"
                                                />
                                                <line
                                                    x1="10"
                                                    x2="10"
                                                    y1="11"
                                                    y2="17"
                                                />
                                                <line
                                                    x1="14"
                                                    x2="14"
                                                    y1="11"
                                                    y2="17"
                                                />
                                            </svg>
                                        </router-link>
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
