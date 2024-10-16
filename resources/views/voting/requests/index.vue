<script setup lang="ts">
useHead({
    title: "Voting: Vote Entry Requests",
});

const props = defineProps<{
    completed: any;
    pending: any;
}>();
</script>

<template layout="main">
    <p>Requests</p>
    <div>
        <h3 class="h3">Completed</h3>
        <template v-if="props.completed.length > 0">
            <ul
                class="max-w-xs flex flex-col divide-y divide-gray-200 dark:divide-neutral-700"
            >
                <li
                    class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-medium text-gray-800 dark:text-white"
                    v-for="(completed, index) in props.completed"
                    :key="index"
                >
                    <p>{{ completed.position }}</p>
                    <p>{{ completed.description }}</p>
                </li>
            </ul>
        </template>
        <template v-else>
            <p>No completed requests</p>
        </template>
    </div>
    <div>
        <h3 class="h3">Pending</h3>
        <template v-if="props.pending.length > 0">
            <ul
                class="max-w-xs flex flex-col divide-y divide-gray-200 dark:divide-neutral-700"
            >
                <li
                    class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-medium text-gray-800 dark:text-white"
                    v-for="(pending, index) in props.pending"
                    :key="index"
                >
                    <p>{{ pending.position }}</p>
                    <p>{{ pending.description }}</p>
                    <!-- <router-link :href="route('voting.requests.create')" >Create Vote Entry Request</router-link> -->
                </li>
            </ul>
        </template>
        <template v-else>
            <p>No pending requests</p>
        </template>
    </div>
</template>
