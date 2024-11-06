<script setup lang="ts">
import { defaultElectionStages } from "~/resources/data/elections/create";

const props = defineProps<{}>();
</script>

<template>
    <SharedCommonCard
        class="gap-2 _sm:w-5/6 shrink-0 max-w-[25rem] flex flex-col min-w-60"
    >
        <div class="text-center">
            <h2 class="text-xl font-medium text-gray-800 dark:text-gray-200">
                Election Details
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Lorem ipsum dolor sit, amet consectetur
            </p>
        </div>

        <div>
            <div class="font-medium pt-2">with date</div>
            <div>
                <ElectionsSelectedCardsTimelineItem
                    v-for="stage in defaultElectionStages"
                    :key="stage.title"
                    :stage="stage"
                />
                <ElectionsSelectedCardsTimelineItem />
                <ElectionsSelectedCardsTimelineItem />
                <ElectionsSelectedCardsTimelineItem />
            </div>
        </div>
    </SharedCommonCard>
</template>
