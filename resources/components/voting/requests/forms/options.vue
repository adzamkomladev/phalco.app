<script setup lang="ts">
import { OptionsInputProps } from "~/resources/interfaces/voting/requests/form.interface";

const props = withDefaults(defineProps<OptionsInputProps>(), {
    id: `input-${Math.random() * 1000}`,
});
const model = defineModel<{ id: number; votes: number }[]>({ required: true });

const updateOption = ({ id, votes }: { id: number; votes: number }) => {
    model.value = model.value?.map((option: { id: number; votes: number }) => {
        if (id === option.id) {
            return { id, votes: +votes };
        }

        return option;
    });
};
</script>

<template>
    <div>
        <VotingRequestsFormsOption
            v-for="(option, index) in options"
            :key="index"
            :option-id="option.id"
            :avatar="option.avatar"
            :label="option.name"
            :name="`option-${option.id}`"
            @update:modelValue="updateOption"
        />
    </div>
</template>
