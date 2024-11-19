<script setup lang="ts">
import { Election } from "~/resources/interfaces/elections/selected.interface";

const props = defineProps<{ election: Election }>();

const formatDate = (dateString: Date | null) => {
    if (!dateString) return "";

    const date = new Date(dateString);

    return date.toLocaleDateString("en-GB", {
        day: "2-digit",
        month: "2-digit",
        year: "2-digit",
    });
};

</script>

<template>
    <SharedCommonCard class="divide-y dark:divide-gray-500 gap-2 flex flex-col">
        <div class="flex items-center gap-2">
            <img
                :src="election.logo"
                class="size-10 aspect-square rounded-full border"
            />

            <span class="font-bold text-2xl">{{
                election.name
            }}</span>
        </div>
        <div
            class="grid text-sm grid-cols-4 xl:grid-cols-5 _xs:divide-y dark:divide-gray-500 _xs:grid-cols-2 gap-6 py-2"
        >
            <div class="grid grid-rows-2 gap-2 col-span-2">
                <div class="grid grid-cols-2 gap-4 col-span-2">
                    <div class="flex gap-4">
                        <SharedCommonIcon name="location" />
                        <span class="text-gray-500"> Location </span>
                    </div>
                    <div class="">
                        <span class="text-gray-500"> Ghana-Accra </span>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 col-span-2">
                    <div class="flex gap-4">
                        <SharedCommonIcon
                            name="creament"
                            class="transform scale-y-[-1] size-6"
                        />
                        <span class="text-gray-500"> Status </span>
                    </div>
                    <div class="">
                        <span class="text-gray-500">
                            <SharedTableStatus :status="election.status" />
                        </span>
                    </div>
                </div>
            </div>
            <div class="grid grid-rows-2 _xs:pt-2 col-span-2">
                <div class="grid grid-cols-2 gap-4 col-span-2">
                    <div class="flex gap-4">
                        <SharedCommonIcon name="calendar" />
                        <span class="text-gray-500"> Due date </span>
                    </div>
                    <div class="">
                        <span class="text-gray-500">{{formatDate(election.end)}} </span>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 col-span-2">
                    <div class="flex gap-4">
                        <SharedCommonIcon
                            name="greet"
                            class="transform size-6 shrink-0"
                        />
                        <span class="text-gray-500"> Assignee </span>
                    </div>
                    <div class="">
                        <span class="text-gray-500">
                            <div class="flex items-center gap-x-3">
                                <img
                                    class="inline-block size-[25px] rounded-full"
                                    :src="election.created_by.avatar"
                                    alt="Avatar"
                                />
                                <div class="grow">
                                    <span
                                        class="block text-xs font-medium text-gray-500 dark:text-neutral-200"
                                        >{{ election.created_by.first_name }}
                                        {{ election.created_by.last_name }}</span
                                    >
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </SharedCommonCard>
</template>
