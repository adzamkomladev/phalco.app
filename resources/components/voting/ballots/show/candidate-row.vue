<script setup lang="ts">
import { Option } from "~/resources/interfaces/voting/ballots/show.interface";

defineProps<{
    data: Option;
}>();
</script>

<template>
    <div class="flex borde p-2 shadow justify-between m-2 rounded-md">
        <div class="flex items-center gap-x-3">
            <div class="font-bold text-2xl">#{{ data.order }}</div>

            <img
                class="inline-block bg-gray-800/5 size-[38px] rounded-full"
                :src="data.avatar"
                alt="Logo"
            />
            <div class="grow">
                <span
                    class="block lg:whitespace-nowrap font-semibold text-gray-800 dark:text-gray-200"
                >
                    {{ data.name }}
                </span>
                <span class="block text-sm text-gray-500">
                    {{ data.party }}
                </span>
            </div>
        </div>
        <div class="flex items-center max-w-[10%]">
            <img :src="data.party_image" />
        </div>
    </div>
</template>
