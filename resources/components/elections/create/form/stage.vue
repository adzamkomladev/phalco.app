<script setup lang="ts">
import ElectionStageProps from "~/resources/interface/elction/create.interface";

const props = defineProps<{ stage: ElectionStageProps }>();
// const model = defineModel({ required: true });
</script>

<template>
    <div class="flex flex-col _sm:gap-5">
        <div class="flex justify-between">
            <input
                placeholder="Add Stage title"
                class="border-transparent p-0 outline-transparent focus:outline-transparent focus:bg-gray-50"
                v-model="stage.title"
            />
            <div>
                <slot name="action" />
            </div>
        </div>
        <div class="flex gap-2">
            <div>
                <SharedFormBaseInput
                    v-model="stage.date.start"
                    :error="stage.date.start"
                    id="start"
                    name="start"
                    type="date"
                    placeholder="hhh"
                    label="start date"
                />
            </div>
            <div>
                <SharedFormBaseInput
                    v-model="stage.date.end"
                    :error="stage.date.end"
                    id="end"
                    name="end"
                    type="date"
                    placeholder="some"
                    label="End date"
                />
            </div>
        </div>
    </div>
</template>
