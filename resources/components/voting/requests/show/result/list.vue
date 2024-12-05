<script lang="ts" setup>
import { VoteRequestresult } from "~/resources/interfaces/voting/requests/show.interface";

const props = withDefaults(defineProps<VoteRequestresult>(), {
    ballotName: "Default Ballot Name",
    optionsResult: [],
});
</script>

<template>
    <div>
        <div class="pb-2">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                {{ ballotName }}
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Results for the {{ ballotName }}.
            </p>
        </div>

        <div class="gap-2 grid place-items-center">
            <div
                v-for="(option, index) in optionsResult"
                :key="index"
                :class="[option.optionPosition === 1 ? 'w-full' : '']"
                class="shadow-card dark:shadow-gray-800 bg-white dark:bg-gray-800 flex justify-between items-center relative overflow-hidden p-[2px] w-[95%] transition-all sm:place-self-center rounded-lg border-transparent border-animate"
            >
                <div
                    v-if="option.optionPosition === 1"
                    class="animate-rotate absolute inset-0 h-full w-full rounded-full bg-[conic-gradient(#eab308_20deg,transparent_120deg)]"
                ></div>

                <div
                    class="flex justify-between w-full z-10 bg-inherit h-full p-2 rounded-lg"
                >
                    <div class="flex items-center gap-x-3">
                        <img
                            class="inline-block size-[38px] rounded-full"
                            :src="
                                'https://randomuser.me/api/portraits/men/' +
                                option.optionPosition +
                                '.jpg'
                            "
                            alt="Candidate Avatar"
                        />
                        <div class="grow">
                            <span
                                class="block lg:whitespace-nowrap font-semibold text-gray-800 dark:text-gray-200"
                            >
                                {{ option.optionfirstName }}
                                {{ option.optionLastName }}
                            </span>
                            <span class="block text-sm text-gray-500">
                                {{ option.optionParty }}
                            </span>
                        </div>
                    </div>

                    <div class="flex gap-4 mobile:gap-2">
                        <div class="flex gap-2 items-center">
                            <span
                                class="block text-sm mobile_:text-nowrap text-gray-500"
                            >
                                Total Votes
                            </span>
                            <span
                                class="block text-xl text-gray-800 font-semibold"
                            >
                                {{ option.optionVoteCount }}
                            </span>
                        </div>

                        <span
                            class="rounded-full size-10 aspect-square flex items-center justify-center font-semibold"
                            :class="[
                                option.optionPosition === 1
                                    ? 'bg-yellow-500 text-white'
                                    : '',
                            ]"
                        >
                            {{ option.optionPosition }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
