<script setup lang="ts">
import { secondsUntil } from "~/resources/utils/shared/date";

useHead({
    title: "Home: Agents",
});

defineProps<{
    requests: App.Data.Agents.RequestData[];
}>();

const election = useProperty("elections.selected");

const timeLeftToEndDate = Math.floor(
    secondsUntil(new Date(election.value?.end!)),
);
</script>
<template layout="agents">
    <div>
        <div class="place-self-center text-center py-10">
            <SharedCommonTimer
                class="text-4xl md:text-5xl md:_xl:text-5xl font-black"
                :duration="timeLeftToEndDate"
            />
            <p class="font-normal text-sm dark:text-gray-300 text-gray-500">
                {{ election?.name }} time left,
            </p>
        </div>

        <HomeAgentsRequestIndexTable :requests="requests" />
    </div>
</template>
