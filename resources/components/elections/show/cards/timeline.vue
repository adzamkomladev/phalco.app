<script setup lang="ts">
import { Stage } from "~/resources/interfaces/elections/selected.interface";

const props = defineProps<{ stages: Stage[]; electionEndDate: Date }>();
</script>

<template>
    <SharedCommonCard
        class="gap-2 col-span-3 col-start-5 shrink-0 flex flex-col"
    >
        <div class="text-center">
            <h2 class="text-xl font-semibold">Election Timeline</h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Lorem ipsum dolor sit, amet consectetur
            </p>
        </div>

        <div class="grow flex flex-col">
            <div class="font-medium pt-2">Date</div>
            <div class="grow flex flex-col">
                <ElectionsShowCardsTimelineItem
                    v-for="(stage, index) in stages"
                    :key="index"
                    :length="stages.length"
                    :stage="stage"
                    :index="index"
                />
                <div class="grid grid-cols-7">
                    <div class="col-start-4 grid place-content-center">
                        <div
                            class="p-1 rounded-full mt-1 aspect-square border grid place-items-center"
                        >
                            <SharedCommonIcon
                                name="branch"
                                class="h-4 mt-[2px]"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </SharedCommonCard>
</template>
