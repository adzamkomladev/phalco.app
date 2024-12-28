<script setup lang="ts">
import { Stage } from "~/resources/interfaces/elections/show.interface";

const datas: Array<{
    status: string;
    sender: string;
    time: string;
}> = [
    { status: "completed", sender: "Danny", time: "10:00 AM" },
    { status: "processing", sender: "Danny", time: "11:00 AM" },
    { status: "canceled", sender: "Amos", time: "11:00 AM" },
    { status: "paused", sender: "Danny", time: "11:30 AM" },
];
const props = defineProps<{ stages: Stage[]; electionEndDate: Date }>();
</script>

<template>
    <SharedCommonCard
        class="gap-2 col-span-3 h-full col-start-5 shrink-0 flex flex-col"
    >
        <div class="text-center">
            <h2 class="text-xl font-semibold">Election Timeline</h2>
            <p class="text-sm text-gray-600 dark:text-gray-400"></p>
        </div>

        <div class="grow flex flex-col">
            <div class="font-medium pt-2">Date</div>
            <div class="grow flex flex-col">
                <div class="grow flex flex-col">
                    <CampaignsSmsShowTimelineItem
                        v-for="(data, index) in datas"
                        :key="index"
                        :length="datas.length"
                        :data="data"
                        :index="index"
                    />
                </div>

                <div class="grid grid-cols-7">
                    <div class="col-start-0 grid place-content-center">
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
    </SharedCommonCard>
</template>
