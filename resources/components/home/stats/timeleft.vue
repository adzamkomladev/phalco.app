<script setup lang="ts">
import { formatDate, secondsUntil } from "~/resources/utils/shared/date";

const electionname = "General Election, 2024";
const date = new Date(2025, 0, 1, 5, 4, 5, 6);
const secondsLeftToEndDate = Math.floor(secondsUntil(date));
const timeAgo = useTimeAgo(date);
</script>

<template>
    <SharedCommonCard>
        <div class="text-gray-800 grid gap-10 p-10">
            <div class="flex justify-between gap-4">
                <div>
                    <p class="font-semibold text-xl">
                        {{ useDateFormat(date, "ddd,DD-MMM YYYY") }}
                    </p>
                    <p class="text-black/50">date</p>
                </div>
                <div>
                    <p class="font-semibold text-xl">{{ timeAgo }}</p>
                    <p class="text-black/50">days Left</p>
                </div>
            </div>
            <div class="place-self-center text-center">
                <SharedCommonTimer
                    class="text-4xl xl:text-6xl font-black"
                    :duration="secondsLeftToEndDate"
                />
                <p class="text-black/50 xl:text-lg">{{ electionname }}</p>
            </div>
        </div>
    </SharedCommonCard>
</template>
