<script setup lang="ts">
import { BaseAdvanceSelectProps } from "~/resources/interfaces/shared/form.interface";

function isSubset<T>(arr1: T[], arr2: T[]): boolean {
    return arr1.every((value) => arr2.includes(value));
}

const props = withDefaults(defineProps<BaseAdvanceSelectProps>(), {
    hideOnSelect: true,
});

const selectedValue = defineModel();
const selectedOption = ref(selectedValue.value);

const selectOption = (option: { value: any; label: string }) => {
    selectedValue.value = option?.value || option;
    selectedOption.value = option;
};

const defaulSelectClass =
    "py-2 px-3 justify-between gap-2 capitalize text-gray-500 min-w-fit flex items-center cursor-pointer bg-white  border rounded-lg text-start text-sm dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400";

const defaultOptionClass =
    "  text-left rounded-md font-thin px-4 text-gray-500 dark:text-gray-400 ";
const defaultOptionsClass =
    " max-h-44 rounded-md  border  overflow-y-auto gap-1 p-2 px-1 flex flex-col bg-white dark:bg-gray-900 dark:border dark:border-gray-700 min-w-fit ";
const defaultSelectedClass = " bg-gray-100 dark:bg-gray-800 ";
</script>

<template>
    <SharedCommonDropdown
        buttonClass="w-full"
        dialogClass="z-50 "
        :position="position"
        :hideContentOnSelect="hideOnSelect"
    >
        <template v-slot:toggle>
            <button class="w-full" :class="[defaulSelectClass, selectClass]">
                <span class="text-base truncate"
                    >{{
                        selectedOption?.label || selectedOption || placeholder
                    }}
                </span>
                <div :class="[' flex items-center flex-col ']">
                    <SharedCommonIcon
                        name="chevron_double"
                        class="text-gray-700 h-4 dark:text-gray-400"
                    />
                </div>
            </button>
        </template>

        <div
            :class="[defaultOptionsClass, optionsClass]"
            v-if="options.length > 0"
        >
            <button disabled :class="[defaultOptionClass, 'opacity-50']">
                {{ placeholder }}
            </button>
            <button
                v-for="(option, index) in options"
                :key="index"
                @click="selectOption(option)"
                type="button"
                :aria-label="`Option ${option}`"
                :class="[
                    (
                        typeof option === 'object'
                            ? selectedValue === option.value
                            : selectedValue === option
                    )
                        ? defaultSelectedClass + ' ' + selectedClass
                        : 'hover:bg-gray-50 dark:hover:bg-gray-800',
                    defaultOptionClass,
                    optionClass,
                ]"
            >
                <SharedCommonIcon
                    v-if="hasIcon"
                    class="h-5"
                    :name="option.value || option"
                /><span>{{ option.label || option }}</span>
            </button>
        </div>
    </SharedCommonDropdown>
</template>
