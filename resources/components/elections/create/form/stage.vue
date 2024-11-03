<script setup lang="ts">
import { ElectionStageProps } from "~/resources/interfaces/elctions/create.interface";

const props = defineProps<{ 
  stage: ElectionStageProps,
  removeStage: (args: { index: number }) => void 
}>();

</script>

<template>
    <div class="flex flex-col _sm:gap-5">
        <div class="flex justify-between">
            <div class="relative">
                <input
                placeholder="Add Stage title"
                class="border-transparent peer w-20 min-w-fit p-0 border-none focus:ring-transparent  "
                v-model="stage.title"
            />
            <SharedCommonIcon name="edit" class="hidden absolute peer-hover:block hover:block pointer-events-none left-1/2 top-0 peer-focus:hidden" />
            <div class="absolute w-0 overflow-hidden  peer-focus:left-0  peer-focus:w-full duration-300  transition-all">
            <div class=" border-b grow bottom-0 border-gray-200 h-1" />

            </div>
            </div>
            
            <div>
                <button
                    @click.prevent="removeStage({ index })"
                    class="text-red-500 text-3xl rounded-full px-2 aspect-square self-end  hover:bg-gray-100"
                >
                    -
                </button>
                <slot name="action" />
            </div>
        </div>
        <div class="flex gap-2 _sm:flex-col">
            <div>
                <SharedFormBaseDateInput
                    v-model:startDate="stage.date.start"
                    id="start"
                    scope="start"
                    type="datetime"
                    placeholder="MM/DD/YYYY"
                    label="Start Date"
                    :endDate="stage.date.end"
                />
                {{stage.date.start}}
            </div>
            <div>
                <SharedFormBaseDateInput
                    v-model:endDate="stage.date.end"
                    id="end"
                    scope="end"
                    type="datetime"
                    placeholder="MM/DD/YYYY"
                    label="End Date"
                    :startDate="stage.date.start"
                />
                {{stage.date.end}}
            </div>
        </div>
    </div>
</template>

