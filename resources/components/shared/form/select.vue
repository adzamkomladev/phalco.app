<script setup lang="ts">
import {selectProps} from '~/resources/interfaces/shared/form.interface'


const props = defineProps<selectProps>();

const emits = defineEmits(["update:modelValue"]);

const selected = ref(props.modelValue);

const selectOption = (option: string | number) => {
    selected.value = option;
    emits("update:modelValue", option);
    
};

const selectedLabel = computed(() => selected.value ?? ( props.placeholder ? props.placeholder: 'select option'));

const defaulSelectClass =
    "py-2 px-3 justify-between gap-2 capitalize text-gray-500 min-w-fit flex items-center cursor-pointer bg-white  border rounded-lg text-start text-sm dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400";

const defaultOptionClass='  text-left rounded-md font-thin px-4 text-gray-500 dark:text-gray-300 '
const defaultOptionsClass=' max-h-44 rounded-md  border dark:border-none  overflow-y-scroll gap-1 p-2 px-1 flex flex-col bg-white dark:bg-gray-800 min-w-fit '
const defaultSelectedClass=' bg-gray-100 dark:bg-gray-700 '

</script>

<template>
    <SharedCommonDropdown buttonClass="w-full" dialogClass=" " :position="position" :hideContentOnSelect="hideOnSelect">
        <template v-slot:toggle >
            <button
            class="w-full"
                :class="[
                    defaulSelectClass,
                    selectClass,
                ]"
            >
                <span class="text-base">{{ selectedLabel }}</span>
                <div  :class="[' flex items-center flex-col ' ,]">
                    <SharedCommonIcon
                        name="chevron_double"
                        class="text-gray-700 h-4"
                    />
                </div>
            </button>
        </template>

        <div
            :class="[defaultOptionsClass,optionsClass]"
        >
           <button
    v-for="(option, index) in options"
    :key="index"
    @click="selectOption(option.label || option)"
    type="button"
    :aria-label="`Option ${option}`"
    :class="[
        selected === (typeof option === 'object' ? option.label : option)
            ? (defaultSelectedClass + selectedClass)
            : 'hover:bg-gray-50 dark:hover:bg-gray-700',
        defaultOptionClass,optionClass
    ]"
>
    {{ option.label || option }}
</button>

        </div>
    </SharedCommonDropdown>
</template>
