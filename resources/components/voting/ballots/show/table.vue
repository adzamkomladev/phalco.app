<script setup lang="ts">
import {
    BallotHeader,
    Option,
} from "~/resources/interfaces/voting/ballots/show.interface";

defineProps<{
    ballotId: number;
    ballotHeader: BallotHeader;
    data: Option[];
}>();
</script>
<template>
    <div
        class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700"
    >
        <!-- Header -->
        <div>
            <div
                class="grid gap-3 px-6 py-4 border-b border-gray-200 md:flex md:justify-between md:items-center dark:border-gray-700"
            >
                <div>
                    <h2
                        class="text-xl font-semibold text-gray-800 dark:text-gray-200"
                    >
                        {{ ballotHeader.title }} {{data}}
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        {{ ballotHeader.description }}
                    </p>
                </div>

                <div>
                    <div class="inline-flex gap-x-2">
                        <router-link
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-primary-400 border border-transparent rounded-lg cursor-pointer gap-x-2 hover:opacity-90 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            :href="
                                route('voting.ballots.options.create', {
                                    id: ballotId,
                                })
                            "
                        >
                            <svg
                                class="flex-shrink-0 size-3"
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                viewBox="0 0 16 16"
                                fill="none"
                            >
                                <path
                                    d="M2.63452 7.50001L13.6345 7.5M8.13452 13V2"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                />
                            </svg>
                            Add new candidate
                        </router-link>
                    </div>
                </div>
            </div>

            <div
                class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700"
            ></div>
        </div>

        <!-- End Header -->

        <!-- Table -->

        <div class="w-full overflow-x-scroll">
            <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    <VotingBallotsShowRow
                        v-for="(option, index) in data"
                        :key="index"
                        :data="option"
                    />
                </tbody>
            </table>
        </div>
    </div>
</template>
