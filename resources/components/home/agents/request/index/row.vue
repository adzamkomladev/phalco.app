<script setup lang="ts">
defineProps<{ request: App.Data.Agents.RequestData }>();
</script>

<template>
    <tr class="bg-white hover:bg-gray-50">
        <!-- First Column -->
        <td class="size-px bg-red ps-4">
            <div class="py-3 pe-6 mobile:px-3 h-full flex items-center">
                <div class="flex items-center gap-x-3">
                    <div class="grow">
                        <span
                            class="block _sm:max-w-[12rem] mobile:w-[10rem] whitespace-nowrap overflow-hidden text-ellipsis mobile:text-xs font-semibold text-gray-800 dark:text-gray-200"
                        >
                            {{ request.position }}
                        </span>
                        <span
                            class="block text-xs mobile:text-[10px] text-gray-500"
                        >
                            {{ request.createdAt }}
                        </span>
                    </div>
                </div>
            </div>
        </td>

        <!-- Second Column -->
        <td class="mobile:px-2 whitespace-nowrap h-full text-sm">
            <div
                class="flex h-full items-center justify-center mobile:scale-[0.85]"
            >
                <SharedTableRequestStatus :status="request.status" />
            </div>
        </td>

        <!-- Third Column -->
        <td
            class="ps-6 py-4 mobile:ps-4 pe-4 mobile:text-[10px] whitespace-nowrap text-right text-sm font-medium"
        >
            <router-link
                v-if="request.status !== 'not_started'"
                class="text-secondary-300 hover:opacity-90"
                :href="route('agents.request')"
                >View Details
            </router-link>
            <router-link
                v-else
                class="text-secondary-300 hover:opacity-90"
                :href="route('agents.requests.create', { id: +request.id })"
                >Submit Votes
            </router-link>
        </td>
    </tr>
</template>
