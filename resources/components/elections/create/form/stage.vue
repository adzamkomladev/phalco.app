<script setup lang="ts">
const props = defineProps<{
    stage: ElectionStageProps;
    removeStage: (args: { index: number }) => void;
}>();
</script>

<template>
    <div class="flex flex-col  relative">
        <div class="flex justify-between ">
            <div class="text-medium" v-if="stage.title">
                {{ stage.title }}
            </div>
            <div class="relative" v-else>
                <input
                    placeholder="Add Stage title"
                    class="border-transparent peer p-0 border-none focus:ring-transparent"
                />
                <SharedCommonIcon
                    name="edit"
                    class="hidden h-3 absolute peer-hover:block hover:block pointer-events-none top-2 right-10 peer-focus:hidden"
                />
                <div
                    class="absolute w-0 overflow-hidden peer-focus:left-0 peer-focus:w-full duration-300 transition-all"
                >
                    <div class="border-b grow bottom-0 h-1" />
                </div>
            </div>
            <div>
                <button
                    @click.prevent="removeStage({ index })"
                    class="text-red-500 text-3xl rounded-full p-2 leading-[0px]  aspect-square hover:bg-gray-100 dark:hover:bg-gray-700 absolute right-0 top-0"
                >
                    -
                </button>
                <slot name="action" />
            </div>
        </div>
        <div class="flex gap-5 _sm:flex-col">
            <div class="basis-1/2">
                <SharedFormBaseDatePicker
                    v-model="stage.date.start"
                    id="start"
                    scope="start"
                    type="datetime"
                    placeholder="mm/dd/yyyy"
                    label="Start Date"
                    :endDate="stage.date.end"
                />
            </div>

            <div class="basis-1/2">
                <SharedFormBaseDatePicker
                    v-model="stage.date.end"
                    id="end"
                    scope="end"
                    type="datetime"
                    placeholder="mm/dd/yyyy"
                    label="End Date"
                    :startDate="stage.date.start"
                />
            </div>
        </div>
    </div>
</template>
