<script setup lang="ts">
const props = defineProps<{
    data: App.Data.Settings.Team.InvitationData[];
}>();
</script>
<template>
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
                            <tr v-for="invite in props.data" :key="invite.id">
                                <td class="size-px whitespace-nowrap">
                                    <div class="py-3 ps-6 lg:ps-3 xl:ps-0 pe-6">
                                        <div class="flex items-center gap-x-3">
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
                                                    {{ invite.role }}
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
                                    class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium"
                                >
                                    <button
                                        type="button"
                                        class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
