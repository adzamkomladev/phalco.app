<script setup lang="ts">
import BallotShowMessageImage from "~/resources/images/main/ballot_show_message.png?src";
import NoPopularStationsFound from "~/resources/svg/main/paper_in_box.svg?src";

const props = withDefaults(defineProps<{ candidates: string }>(), {});
</script>

<template>
    <SharedCommonCard
        class="font-medium h-full flex flex-col mobile_:_sm:py-10 text-center gap-4 shadow-card _sm:shadow _sm:p-5 rounded-2xl"
    >
        <div class="">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                Candidates Coomparison
            </h2>
        </div>
        <div v-if="candidates?.length > 0">
            <div class="grid grid-flow-col gap-4">
                <div
                    v-for="l in 3"
                    :key="l"
                    class="place-contents-center grid gap-2"
                >
                    <div class="w-[70%] place-self-center">
                        <img
                            class="rounded-full size-full aspect-square mx-auto"
                            src="https://randomuser.me/api/portraits/women/1.jpg"
                        />
                    </div>

                    <div
                        class="flex place-self-center items-center justify-center gap-1"
                    >
                        <img
                            class="block w-[40%] max-w-16 shrink"
                            :src="'https://th.bing.com/th/id/OIF.yRYILBPmoTPx6h57DeG40Q?w=197&h=180&c=7&r=0&o=5&pid=1.7'"
                        />
                        <p class="font-black uppercase truncate">NPP</p>
                    </div>
                </div>
            </div>

            <div>
                <p class="text-left font-normal text-sm">Approval rate</p>
                <div class="flex items-center gap-2">
                    <p class="text-xs">50%</p>
                    <SharedCommonProgressBar
                        hideCountProgress
                        loaded-class=" bg-forest-300 "
                        :progess="50"
                        :total="100"
                    />
                    <p class="text-xs">50%</p>
                </div>
            </div>
        </div>

        <div
            v-else
            class="p-5 flex _md:flex-col gap-5 _sm:gap-0 _xl:md:gap-0 _xl:md:flex-col"
        >
            <img
                :src="NoPopularStationsFound"
                class="w-[50%] _md:w-full _xl:md:w-[60%] max-h-96 place-self-center"
            />
            <p class="text-black/70 pt-4 capitalize place-self-center">
                no stat to compare
            </p>
        </div>
    </SharedCommonCard>
</template>
