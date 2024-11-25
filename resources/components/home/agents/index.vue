<script setup lang="ts">
import { formatDate, secondsUntil } from "~/resources/utils/shared/date";

const props = defineProps<{ stageStat: StageStatsVoting; stage: Stage }>();

const timeLeftToEndDate = Math.floor(secondsUntil(new Date()));
</script>

<template>
    <div>
        <div class="place-self-center text-center py-10">
            <SharedCommonTimer
                class="text-4xl md:text-5xl md:_xl:text-5xl font-black"
                :duration="timeLeftToEndDate"
            />

            <p class="font-normal text-sm dark:text-gray-300 text-gray-500">
                General Election,
            </p>
        </div>

        <HomeAgentsTable />
    </div>
</template>
