<script setup lang="ts">
import NoCampaignMessageImage from "~/resources/images/main/no_campaign_message.png?src";
import NoCampaignDetalsImage from "~/resources/svg/main/paper_in_box.svg?src";

defineProps<{ message: any }>();
</script>

<template>
    <SharedCommonCard class="h-full transion-all space-y-4">
        <div>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                Vote for Komla
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">#7678978209</p>
        </div>
        <div class="shadow rounded-lg p-4 space-y-2">
            <h2
                v-if="message?.data"
                class="text-base font-semibold text-gray-800 dark:text-gray-200"
            >
                Vote for Komla
            </h2>
            <div
                v-if="message?.data"
                class="text-sm transition-all flex flex-col-reverse"
            >
                <details class="peer group w-fit">
                    <summary class="peer flex cursor-pointer">
                        <p
                            class="text-primary-500 dark:text-primary-300 italic"
                        >
                            <span class="group-open:hidden">read more</span
                            ><span class="group-open:block hidden"
                                >read less</span
                            >
                        </p>
                    </summary>
                </details>
                <p
                    class="text-gray-600 peer-open:line-clamp-none line-clamp-4 dark:text-gray-400 transition-all overflow-hidden"
                >
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Fuga reiciendis quam, deleniti voluptatum autem neque
                    assumenda tenetur esse expedita nesciunt laborum perferendis
                    doloremque voluptates molestiae alias ullam reprehenderit
                    facilis obcaecati? Fuga reiciendis quam, deleniti voluptatum
                    autem neque assumenda tenetur esse expedita nesciunt laborum
                    perferendis doloremque voluptates molestiae alias ullam
                    reprehenderit facilis obcaecati?
                </p>
            </div>
            <div v-else class="flex items-end justify-center">
                <img class="h-24" :src="NoCampaignMessageImage" />
                <p>No Campaign Message</p>
            </div>
        </div>
        <div class="grid gap-2">
            <h2
                class="text-base font-semibold text-gray-600 dark:text-gray-400"
            >
                Details
            </h2>
            <p class="text-xs text-gray-600 dark:text-gray-400">
                Lorem ipsum dolor sit lorem5 amet.
            </p>
        </div>
        <div class="flex flex-wrap" v-if="message?.details">
            <div class="space-y-2 grow">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Sender Name
                </p>
                <p
                    class="text-xs font-semibold text-gray-600 dark:text-gray4200"
                >
                    Asante Gilbert
                </p>
            </div>
            <div class="space-y-2 grow">
                <p class="text-sm text-gray-600 dark:text-gray-400">Status</p>
                <SharedTableRequestStatus status="completed" />
            </div>
        </div>
        <div v-else class="flex items-center  justify-evenly">
                        <p>No Info</p>

            <img class="h-24" :src="NoCampaignDetalsImage" />
        </div>
    </SharedCommonCard>
</template>
