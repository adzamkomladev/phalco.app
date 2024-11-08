<script setup lang="ts">
import { defaultElectionStages } from "~/resources/data/elections/create";
</script>

<template>
    <SharedCommonCard
        class="gap-2 col-span-3 col-start-5 shrink-0 flex flex-col "
    >
        <div class="text-center">
            <h2 class="text-xl font-semibold ">
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
                    v-for="(stage, index) in defaultElectionStages"
                    :key="stage.title"
                    :stage="stage"
                    :index="index"
                />
                <div class="grid grid-cols-7">
                    <div class="col-start-3 grid place-content-center">
                        <div
                            class="p-1 rounded-full mt-1 aspect-square border grid place-items-center"
                        >
                            <SharedCommonIcon
                                name="branch"
                                class="h-4 mt-[2px] "
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </SharedCommonCard>
</template>
