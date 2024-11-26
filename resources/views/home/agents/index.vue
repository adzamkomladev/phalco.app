<script setup lang="ts">
useHead({
    title: "Agents",
});

import { formatDate, secondsUntil } from "~/resources/utils/shared/date";

const timeLeftToEndDate = Math.floor(secondsUntil(new Date()));
</script>
<template layout="agents">
    <div>
        <div class="place-self-center text-center py-10">
            <SharedCommonTimer
                class="text-4xl md:text-5xl md:_xl:text-5xl font-black"
                :duration="7898"
            />

            <p class="font-normal text-sm dark:text-gray-300 text-gray-500">
                General Election time left,
            </p>
        </div>

        <HomeAgentsTable />
        <!-- <HomeAgentsRequestShow /> -->
    </div>
</template>
