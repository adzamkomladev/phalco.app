<script setup lang="ts">
import { ElectionRequestRequestStatusProps } from "~/resources/interfaces/home/agent.interface";

defineProps<{ request: ElectionRequestRequestStatusProps }>();
</script>

<template>
    <tr class="bg-white hover:bg-gray-50">
        <!-- First Column -->
        <td class="size-px bg-red">
            <div
                class="py-3 ps-6 lg:ps-3 pe-6 mobile:px-3 h-full flex items-center"
            >
                <div class="flex items-center gap-x-3">
                    <div class="grow">
                        <span
                            class="block _sm:max-w-[12rem] whitespace-nowrap overflow-hidden text-ellipsis mobile:text-sm font-semibold text-gray-800 dark:text-gray-200"
                        >
                            {{ request.election_name }}
                        </span>
                        <span
                            class="block text-xs mobile:text-[10px] text-gray-500"
                        >
                            {{ request.date_sent }}
                        </span>
                    </div>
                </div>
            </div>
        </td>

        <!-- Second Column -->
        <td class="mobile:px-2 whitespace-nowrap h-full text-sm">
            <div class="flex h-full items-center justify-center">
                <SharedTableRequestStatus :status="request.status" />
            </div>
        </td>

        <!-- Third Column -->
        <td
            class="px-6 py-4 mobile:px-4 mobile:text-xs whitespace-nowrap text-right text-sm font-medium"
        >
            <a class="text-blue-600 hover:text-secondary-300" href="#"
                >View Details</a
            >
        </td>
    </tr>
</template>
