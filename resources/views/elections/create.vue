<script setup lang="ts">
import StartElectionImage from "~/resources/images/election/start.png?src";
import ElectionStageProps from "~/resources/interface/election/create.interface";
import { defaultData } from "~/resources/data/elections/create";
useHead({
    title: "New Election",
});

const form = useForm({
    method: "POST",
    url: route("elections.store"),
    fields: {
        name: "",
        description: "",
        logo: "",
        start: null,
        end: null,
        stages: [] as ElectionStageProps[], // Set stages as an array of ElectionStageProps
    },
    hooks: {
        success: () => form.reset(),
    },
});

onMounted(() => {
    form.fields.stages = [...defaultData, []];
});

// Method to add a new stage
const addStage = () => {
    form.fields.stages.push({
        title: "",
        date: {
            start: null,
            end: null,
        },
    });
};

// Method to remove a stage by index
const removeStage = (index: number) => {
    form.fields.stages.splice(index, 1);
};
</script>

<template>
    <SharedCommonOverlay
        class="max-w-xl _sm:max-w-full"
        title="New Election"
        size="xl"
    >
        <div class="">
            <div
                class="flex rounded-3xl bg-secondary-300 dark:bg-secondary-700"
            >
                <div class="font-medium p-5 px-10 shrink text-wrap">
                    <p class="text-gray-50 text-xl dark:text-gray-100">
                        Start an Election of your choice
                    </p>
                    <p class="font-normal text-gray-200">
                        To start using Phalco, confirm your email address with
                        the email we sent to:
                    </p>
                </div>
                <img :src="StartElectionImage" class="w-40 p-5 pl-0" />
            </div>

            <form
                @submit.prevent="form.submit"
                class="flex flex-col gap-5 mt-10 px-4 sm:px-8"
            >
                <div class="sm:col-span-9">
                    <SharedFormBaseInput
                        v-model="form.fields.name"
                        :error="form.errors.name"
                        id="name"
                        name="name"
                        placeholder="Election Name"
                    />
                </div>

                <div>
                    <SharedFormBaseTextarea
                        v-model="form.fields.description"
                        :error="form.errors.description"
                        id="description"
                        name="description"
                        placeholder="Enter election description"
                    />
                </div>
                <div class="flex _sm:flex-col _sm:gap-5">
                    <div>
                        <SharedFormBaseInput
                            v-model="form.fields.start"
                            :error="form.errors.start"
                            id="start"
                            name="start"
                            type="datetime-local"
                            placeholder="some"
                        />
                    </div>

                    <div>
                        <SharedFormBaseInput
                            v-model="form.fields.end"
                            :error="form.errors.end"
                            id="end"
                            name="end"
                            type="date"
                            placeholder="hhh"
                        />
                    </div>
                </div>
                <div>
                    <div class="flex flex-col gap-5">
                        <div
                            v-for="(stage, index) in form.fields.stages"
                            :key="index"
                            class="mt-4"
                        >
                            <ElectionsCreateFormStage :stage="stage">
                                <template v-slot:action>
                                    <button
                                        @click.prevent="removeStage(index)"
                                        class="text-red-500 text-lg rounded-full px-3 aspect-square self-end bg-gray-100 hover:bg-crimson-100"
                                    >
                                        -
                                    </button>
                                </template>
                            </ElectionsCreateFormStage>
                        </div>
                    </div>

                    <button
                        @click.prevent="addStage"
                        class="mt-5 text-forest-300 w-fit p-2 gap-2 text-sm flex items-center border border-forest-300 rounded-md"
                    >
                        <SharedCommonIcon stroke-width="1" name="plus" />
                        <p class="">Add Another Stage</p>
                    </button>
                </div>

                <div class="py-10">
                    <SharedFormSubmitButton text="create" />
                </div>
            </form>
        </div>
    </SharedCommonOverlay>
</template>
