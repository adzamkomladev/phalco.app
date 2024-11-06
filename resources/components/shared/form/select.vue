<script setup lang="ts">
const props = defineProps<{
    modelValue: string | number;
    options: Array<string | number>;
    position?:
        | "top-right"
        | "top-left"
        | "top-center"
        | "bottom-right"
        | "bottom-left"
        | "bottom-center";
    selectClass?: string;
}>();

const emits = defineEmits(["update:modelValue"]);

const selected = ref(props.modelValue);

const selectOption = (option: string | number) => {
    selected.value = option;
    emits("update:modelValue", option);
};

const selectedLabel = computed(() => selected.value ?? "Select");

const defaulSelectClass =
    "py-2 px-3 justify-between gap-2 w-[4rem] min-w-fit flex items-center cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus-within:border-blue-500 focus:ring-red-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400";
</script>

<template>
    <SharedCommonDropdown :position="position">
        <template v-slot:toggle>
            <button
                :class="[
                    selectClass ? selectClass : defaulSelectClass,
                    selectClass,
                ]"
            >
                <span class="text-base">{{ selectedLabel }}</span>
                <div v-if="!selectClass" class="flex items-center flex-col">
                    <SharedCommonIcon
                        name="chevron"
                        class="text-gray-700 -mb-2"
                    />
                    <SharedCommonIcon
                        name="chevron"
                        class="text-gray-700 rotate-180"
                    />
                </div>
            </button>
        </template>

        <div
            class="max-h-44 rounded-md shadow-sm border overflow-y-scroll gap-1 p-2 flex flex-col bg-white w-20 min-w-fit"
        >
            <button
                v-for="(option, index) in options"
                :key="index"
                @click="selectOption(option)"
                type="button"
                :aria-label="`Option ${option}`"
                :class="[
                    selected === option ? 'bg-slate-100' : 'hover:bg-slate-50',
                    'rounded-md px-4 py-2 text-gray-500',
                ]"
            >
                {{ option }}
            </button>
        </div>
    </SharedCommonDropdown>
</template>
