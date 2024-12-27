<script setup lang="ts">
import NoTimelineImage from "~/resources/svg/main/no_ongoing.svg?src";

const props = defineProps<{
    timeline: any,
}>();

</script>

<template>
    <SharedCommonCard
        class="gap-2 col-span-3 h-full col-start-5 shrink-0 flex flex-col"
    >
        <div class="text-center">
            <h2 class="text-xl font-semibold">Campaign Timeline</h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">Lorem ipsum dolor sit amet.</p>
        </div>

        <div class="grow flex flex-col" v-if="timeline">
            <div class="grow flex flex-col">
                <div class="grow flex flex-col">
                    <CampaignsSmsShowTimelineItem
                        v-for="(data, index) in timeline"
                        :key="index"
                        :length="timeline.length"
                        :data="data"
                        :index="index"
                    /> 
                </div>

                <div class="grid grid-cols-7">
                    <div class="col-start-2 grid place-content-center">
                        <div
                            class="p-1 rounded-full mt-1 aspect-square border grid place-items-center"
                        >
                            <SharedCommonIcon
                                name="message_sent"
                                class="h-4 mt-[2px]"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-else class="grid place-items-center  h-full" >
            <img :src="NoTimelineImage" />
            <p class="">No Data</p>
        </div>
    </SharedCommonCard>
</template>
