<script setup lang="ts">
import { PollingStationCardProps } from "~/resources/interfaces/voting/polling-stations/index.interface";

const props = defineProps<PollingStationCardProps>();

const visitDetails = () => {
    router.get(route("voting.polling-stations.show", { id: props.id }));
};
</script>

<template>
    <SharedCommonCard
        class="font-medium p-auto gap-2 flex flex-col justify-center shadow-card _sm:shadow _sm:p-5 rounded-2xl relative"
        @click="visitDetails"
    >
        <div class="flex justify-between">
            <h2
                class="text-base font-semibold text-gray-800 dark:text-gray-200"
            >
                {{ name }}
            </h2>
            <span
                class="bg-secondary-500 block size-6 rounded-full place-self-end"
            />
        </div>
        <div>
            <p class="text-sm text-gray-400 dark:text-gray-400">Total Votes</p>

            <h2
                class="text-base font-semibold text-gray-800 dark:text-gray-200"
            >
                {{ votes }}
            </h2>
        </div>
        <div>
            <div class="flex justify-between">
                <div>
                    <p class="text-sm text-gray-400 dark:text-gray-400">Code</p>

                    <h2
                        class="text-4xl font-semibold text-gray-800 dark:text-gray-200"
                    >
                        {{ code }}
                    </h2>
                </div>
                <div class="flex items-end">
                    <SharedTableStatus :status="status" class="mt-auto" />
                </div>
            </div>
        </div>
    </SharedCommonCard>
</template>
