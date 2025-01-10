<script setup lang="ts">
const props = defineProps<{ data: App.Data.CardStatData }>();

const left = computed(() => props.data.stats[0]);
const right = computed(() => props.data.stats[1]);
const to = computed(() => props.data.to as any);
</script>

<template>
    <SharedCommonCard
        class="divide-y dark:divide-gray-500 text-sm gap-2 shrink-0 _sm:max-w-[25rem] flex flex-col min-w-56"
    >
        <div class="flex justify-between items-center">
            <div class="flex gap-2 items-center">
                <span class="bg-slate-100 dark:bg-slate-700 p-2 rounded-lg">
                    <SharedCommonIcon
                        :name="data.icon"
                        stroke-width="1.5"
                        class="h-6 aspect-square"
                    />
                </span>
                <span class="font-semibold text-base">{{ data.title }}</span>
            </div>
            <router-link
                v-if="to"
                :href="route(to)"
                class="p-1 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 group"
            >
                <SharedCommonIcon
                    name="chevron"
                    class="rotate-90 dark:text-gray-400 size-6 group-hover:translate-x-1 transition-all duration-300 group-hover:text-primary-300 dark:group-hover:text-primary-500"
                    stroke-width="1"
                />
            </router-link>
        </div>
        <div class="pt-5 _sm:pt-2 flex justify-between">
            <div class="">
                <p class="text-base font-bold relative w-fit">
                    {{ left.value }}
                </p>
                <p class="text-gray-500">{{ left.title }}</p>
            </div>
            <div>
                <p class="font-semibold relative w-fit">
                    {{ right.value }}
                </p>
                <p class="text-gray-500">{{ right.title }}</p>
            </div>
        </div>
    </SharedCommonCard>
</template>
