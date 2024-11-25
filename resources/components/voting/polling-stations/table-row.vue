<script setup lang="ts">
import { StatsCardProps } from "~/resources/interfaces/shared/common.interface";

const props = defineProps<{
    row: { key: any; value: any; extra: any };
    columns: any[];
    findColumn: (name: string) => any;
}>();

const { key, value, extra } = props.row;
</script>

<template>
    <SharedCommonCard
        class="font-medium p-auto max-w-72 gap-2 flex flex-col justify-center shadow-card _sm:shadow _sm:p-5 rounded-2xl relative"
    >
        <div class="flex justify-between">
            <h2
                class="text-base font-semibold text-gray-800 dark:text-gray-200"
            >
                {{ value(findColumn("name")) }}
            </h2>
            <span
                class="bg-secondary-500 block size-6 rounded-full place-self-end"
            />
        </div>
        <div>
            <p class="text-sm text-gray-400 dark:text-gray-400">Total Votes</p>

            <h2
                class="text-base font-semibold text-gray-800 dark:text-gray-200"
            >
                123,674
            </h2>
        </div>
        <div>
            <div class="flex justify-between">
                <div>
                    <p class="text-sm text-gray-400 dark:text-gray-400">Code</p>

                    <h2
                        class="text-2xl font-black text-gray-800 dark:text-gray-200"
                    >
                        567678
                    </h2>
                </div>
                <div class="flex items-end">
                    <SharedTableStatus status="active" class="mt-auto" />
                </div>
            </div>
        </div>
    </SharedCommonCard>
</template>
