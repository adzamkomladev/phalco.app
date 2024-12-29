<script setup lang="ts">
import { BaseAdvanceSelectProps } from "~/resources/interfaces/shared/form.interface";

function isSubset<T>(arr1: T[], arr2: T[]): boolean {
    return arr1.every((value) => arr2.includes(value));
}

const props = withDefaults(defineProps<BaseAdvanceSelectProps>(), {
    hideOnSelect: true,
    selectMultiple: false, // prop for multi-select functionality
});

const selectedValue = defineModel();

const selectedOptions = ref<any[]>(
    Array.isArray(selectedValue.value)
        ? props.options.filter((option) =>
              selectedValue.value.includes(option.value || option),
          )
        : [],
);

const selectedOption = ref(
    props.selectMultiple
        ? props.options.filter((n: any) =>
              Array.isArray(selectedValue.value)
                  ? selectedValue.value.includes(n.value || n)
                  : false,
          )
        : props.options.find(
              (n: any) =>
                  n.value === selectedValue.value || selectedValue || null,
          ),
);

const selectOption = (option: { value: any; label: string }) => {
    if (props.selectMultiple) {
        const existingIndex = selectedOptions.value.findIndex(
            (selected) => selected.value === (option.value || option),
        );

        if (existingIndex === -1) {
            // Add the full option object
            selectedOptions.value.push(option);
        } else {
            // Remove the option by value
            selectedOptions.value.splice(existingIndex, 1);
        }

        // Update the model with the full array of selected options
        selectedValue.value = selectedOptions.value.map((opt) => opt.value);
    } else {
        selectedValue.value = option.value || option;
        selectedOption.value = option;
    }
};

const defaulSelectClass =
    "py-2 px-3 justify-between gap-2 capitalize text-gray-500 min-w-fit flex items-center cursor-pointer bg-white  border rounded-lg text-start text-sm dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400";

const defaultOptionClass =
    "text-left rounded-md font-thin px-4 text-gray-500 dark:text-gray-400";
const defaultOptionsClass =
    "max-h-44 rounded-md border overflow-y-auto gap-1 p-2 px-1 flex flex-col bg-white dark:bg-gray-900 dark:border dark:border-gray-700 min-w-fit";
const defaultSelectedClass = "bg-gray-100 dark:bg-gray-800";
</script>

<template>
    <SharedCommonDropdown
        buttonClass="w-full"
        dialogClass="z-50"
        :position="position"
        :hideContentOnSelect="hideOnSelect"
    >
        <template v-slot:toggle>
            <button
                class="w-full overflow-hidden"
                :class="[defaulSelectClass, selectClass]"
            >
                <span class="text-base truncate max-w-[calc(100vw_-10rem)]">
                    {{
                        props.selectMultiple
                            ? selectedOptions
                                  .map((opt) =>
                                      typeof opt === "object" ? opt.label : opt,
                                  )
                                  .join(", ") || placeholder
                            : selectedOption?.label ||
                              selectedOption ||
                              placeholder
                    }}
                </span>
                <div :class="['flex items-center flex-col']">
                    <SharedCommonIcon
                        name="chevron_double"
                        class="text-gray-700 h-4 dark:text-gray-400"
                    />
                </div>
            </button>
        </template>

        <div
            :class="[defaultOptionsClass, optionsClass]"
        >
            <button disabled :class="[defaultOptionClass, 'opacity-50']">
                {{ (options.length > 0 ? '':'No ') + placeholder  }}
            </button>
            <button
            v-if="options.length > 0"
                v-for="(option, index) in options"
                :key="index"
                @click="selectOption(option)"
                type="button"
                :aria-label="`Option ${option.label || option}`"
                :class="[
                    props.selectMultiple
                        ? ' flex items-center justify-between '
                        : (
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
                <div class="flex gap-2 items-center">
                    <SharedCommonIcon
                        v-if="hasIcon"
                        class="h-5"
                        :name="option.value || option"
                    />
                    <span class="capitalize">{{ option.label || option }}</span>
                </div>
                <div class="text-forest-300">
                    {{
                        selectedOptions.find((selOpt) =>
                            typeof option === "object"
                                ? option.value === selOpt.value
                                : option === selOpt,
                        )
                            ? "✔"
                            : ""
                    }}
                </div>
            </button>
        </div>
    </SharedCommonDropdown>
</template>
