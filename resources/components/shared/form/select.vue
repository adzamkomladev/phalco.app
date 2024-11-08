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
    "py-2 px-3 justify-between gap-2 w-[4rem] min-w-fit flex items-center cursor-pointer bg-white  border rounded-lg text-start text-sm dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400";
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
                        name="chevron_double"
                        class="text-gray-700 h-4"
                    />
                </div>
            </button>
        </template>

        <div
            class="max-h-44 rounded-md shadow-sm border dark:border-none overflow-y-scroll gap-1 p-2 flex flex-col bg-white dark:bg-gray-800 w-20 min-w-fit"
        >
            <button
                v-for="(option, index) in options"
                :key="index"
                @click="selectOption(option)"
                type="button"
                :aria-label="`Option ${option}`"
                :class="[
                    selected === option
                        ? 'bg-slate-100 dark:bg-slate-700'
                        : 'hover:bg-slate-50 dark:hover:bg-slate-700',
                    'rounded-md px-4 py-2 text-gray-500 dark:text-gray-300',
                ]"
            >
                {{ option }}
            </button>
        </div>
    </SharedCommonDropdown>
</template>
