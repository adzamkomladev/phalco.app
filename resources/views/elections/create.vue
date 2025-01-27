<script setup lang="ts">
import StartElectionImage from "@/images/election/start.webp?src";
import { ElectionStageProps } from "@/interfaces/elections/create.interface";
import useElections from "@/composables/elections";

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
        stages: [] as ElectionStageProps[],
    },
    hooks: {
        success: () => form.reset(),
    },
});

const { getDefaultStages } = useElections();
const defaultElectionStages = getDefaultStages();

const addedStages = ref(defaultElectionStages.slice(0, 1));
const removedDefaultStages = ref(defaultElectionStages.slice(1));

onMounted(() => {
    form.fields.stages = [...addedStages.value];
});

const addCustomStage = () => {
    form.fields.stages.push({
        title: "",
        name: "",
        start: null,
        end: null,
    });
};

const addToStages = (stageTitle: string) => {
    const stageIndex = removedDefaultStages.value.findIndex(
        (stage: ElectionStageProps) => stage.title === stageTitle,
    );
    if (stageIndex > -1) {
        const [stage] = removedDefaultStages.value.splice(stageIndex, 1);
        form.fields.stages.push(stage);
    }
};

const removeStage = (index: number) => {
    const stage = form.fields.stages[index];
    form.fields.stages.splice(index, 1);

    const defaultStageIndex = defaultElectionStages.findIndex(
        (defaultStage) => defaultStage.title === stage.title,
    );
    if (defaultStageIndex > -1) {
        if (
            !removedDefaultStages.value.some(
                (removedStage: ElectionStageProps) =>
                    removedStage.title === stage.title,
            )
        ) {
            removedDefaultStages.value.push(stage);
        }
    }
};
</script>

<template>
    <SharedCommonOverlay
        class="max-w-xl _sm:max-w-full"
        title="New Election"
        size="xl"
    >
        <div>
            <div
                class="flex rounded-3xl bg-secondary-300 dark:bg-gradient-to-r from-secondary-950 to-secondary-800"
            >
                <div class="font-medium p-5 px-10 shrink text-wrap">
                    <p class="text-gray-50 text-xl dark:text-gray-100">
                        Start an Election of your choice
                    </p>
                    <p
                        class="font-normal text-sm dark:text-gray-300 text-gray-100"
                    >
                        To start using Phalco, confirm your email address with
                        the email we sent to:
                    </p>
                </div>
                <img
                    :src="StartElectionImage"
                    class="w-40 p-5 pl-0 _sm:hidden"
                />
            </div>

            <form
                @submit.prevent="form.submit"
                class="flex flex-col gap-5 mt-10"
            >
                <div>
                    <SharedFormBaseImageUpload v-model="form.fields.logo" />
                </div>

                <div class="sm:col-span-9">
                    <SharedFormBaseInput
                        v-model="form.fields.name"
                        :error="form.errors.name"
                        id="name"
                        name="name"
                        placeholder="Name"
                    />
                </div>

                <div>
                    <SharedFormBaseTextarea
                        v-model="form.fields.description"
                        :error="form.errors.description"
                        id="description"
                        name="description"
                        placeholder="Description"
                    />
                </div>

                <div class="flex _sm:flex-col gap-5">
                    <div class="basis-1/2">
                        <SharedFormBaseDatePicker
                            v-model="form.fields.start"
                            id="start"
                            scope="start"
                            type="datetime"
                            placeholder="mm/dd/yyyy"
                            label="Start Date"
                            :endDate="form.fields.end"
                        />
                    </div>
                    <div class="basis-1/2">
                        <SharedFormBaseDatePicker
                            v-model="form.fields.end"
                            id="end"
                            scope="end"
                            type="datetime"
                            placeholder="mm/dd/yyyy"
                            label="End Date"
                            :startDate="form.fields.start"
                        />
                    </div>
                </div>
                <div class="peer">
                    <h2
                        class="text-lg py-2 font-semibold text-gray-800 dark:text-gray-200"
                    >
                        Election Stages
                    </h2>
                    <div class="flex flex-col gap-4">
                        <div
                            v-for="(stage, index) in form.fields.stages"
                            :key="index"
                            class=""
                        >
                            <div>
                                <transition>
                                    <ElectionsCreateFormStage
                                        v-if="
                                            form.fields.stages.includes(stage)
                                        "
                                        name="fade"
                                        :stage="stage"
                                        :index="index"
                                        @remove-stage="removeStage"
                                    />
                                </transition>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 peer">
                        <SharedCommonDropdown>
                            <template v-slot:toggle>
                                <button
                                    class="text-forest-300 w-fit p-2 gap-2 text-sm flex items-center border border-forest-300 rounded-md"
                                >
                                    <SharedCommonIcon
                                        stroke-width="1"
                                        name="plus"
                                    />
                                    <p class="">Add Another Stage</p>
                                </button>
                            </template>
                            <div
                                class="p-2 bg-white dark:bg-gray-800 shadow-card dark:shadow-gray-900 rounded-md text-sm flex text-gray-700 dark:text-gray-300 flex-col gap-1 w-48"
                            >
                                <button
                                    v-for="(
                                        stage, index
                                    ) in removedDefaultStages"
                                    :key="index"
                                    @click.prevent="addToStages(stage.title)"
                                    class="text-left px-2 hover:bg-slate-100 dark:hover:bg-slate-700 py-1 rounded-md"
                                >
                                    {{ stage.title }}
                                </button>
                                <button
                                    disabled
                                    @click.prevent="addCustomStage"
                                    class="px-2 text-left disabled:opacity-50"
                                >
                                    Custom stage
                                </button>
                            </div>
                        </SharedCommonDropdown>
                    </div>
                </div>

                <div class="pt-2 peer-focus-within:-z-10">
                    <SharedFormSubmitButton
                        text="create"
                        :loading="form.processing"
                    />
                </div>
            </form>
        </div>
    </SharedCommonOverlay>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 100s ease; /* Adjust duration as needed */
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
