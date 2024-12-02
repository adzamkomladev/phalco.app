<script setup lang="ts">
defineProps<{
    requests: App.Data.Agents.RequestData[];
}>();
</script>
<template>
    <div class="px-8 overflow-x-hidden pb-10 mx-auto">
        <div class="flex flex-col">
            <div class="">
                <div class="mb-6">
                    <div class="">
                        <h2
                            class="text-xl font-semibold text-gray-800 dark:text-gray-200"
                        >
                            All Vote Requests
                        </h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Statuses of all the vote requests for this polling station
                        </p>
                    </div>
                </div>

                <div class="overflow-x-auto -mx-4 px-4">
                    <table class="min-w-full">
                        <tbody>
                            <HomeAgentsRequestIndexRow
                                v-for="(request, index) in requests"
                                :key="index"
                                :request="request"
                            />
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
