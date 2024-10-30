<script setup lang="ts">
import { SettingsTeamsStatsCard } from "~/resources/interfaces/settings/index.interface";

const props = defineProps<SettingsTeamsStatsCard>();
</script>

<template>
    <div
        class="flex _sm:w-60 _sm:justify-self-center flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800"
    >
        <div class="inline-flex justify-center items-center">
            <span
                class="size-2 inline-block rounded-full me-2"
                :class="[type === 'r' ? 'bg-[#D85B53]' : 'bg-forest-300']"
            ></span>
            <span
                class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400"
                >{{ title }}</span
            >
        </div>

        <div class="text-center">
            <h3
                class="text-4xl sm:text-5xl lg:text-6xl font-semibold text-gray-800 dark:text-neutral-200"
            >
                {{ total }}
            </h3>
        </div>

        <dl
            class="flex justify-center items-center divide-x-2 divide-gray-200 dark:divide-neutral-800"
        >
            <dt class="pe-3">
                <span
                    class="flex gap-1"
                    :class="[
                        type === 'r' ? 'text-[#D85B53]' : 'text-forest-300',
                    ]"
                >
                    <SharedCommonIcon name="tri" class="size-5" />
                    <span class="inline-block text-sm">
                        {{ changePercentage }}%
                    </span>
                </span>
                <span class="block text-sm text-gray-500 dark:text-neutral-500"
                    >change</span
                >
            </dt>
            <dd class="text-start ps-3">
                <span
                    class="text-sm font-semibold text-gray-800 dark:text-neutral-200"
                    >{{ changeTotal }}</span
                >
                <span class="block text-sm text-gray-500 dark:text-neutral-500"
                    >last week</span
                >
            </dd>
        </dl>
    </div>
</template>
