<script setup lang="ts">
import { Agent } from "~/resources/interfaces/voting/agents/index.interface";

const props = defineProps<{
    row: { key: any; value: any; extra: any };
    columns: any[];
    findColumn: (label: string) => any;
}>();

const emits = defineEmits<{
    (e: "selectAgent", value: Agent): void;
}>();

const { value, extra } = props.row;

const id = +extra(props.findColumn("name"), "id");
const name = value(props.findColumn("name"));
const pollingStations = value(props.findColumn("polling_stations"));
const addedOn = value(props.findColumn("added_on"));
const email = extra(props.findColumn("name"), "email");
const phone = extra(props.findColumn("name"), "phone");
const avatar = extra(props.findColumn("name"), "avatar");
const voteRequests = extra(
    props.findColumn("polling_stations"),
    "vote_requests",
);

const selectAgent = () =>
    emits("selectAgent", {
        id,
        name,
        email,
        phone,
        pollingStations,
        addedOn,
        voteRequests,
        avatar,
    });
</script>

<template>
    <tr class="cursor-pointer text-sm" @click="selectAgent">
        <td class="size-px whitespace-nowrap">
            <!-- <div class="ps-6 py-3">
                <label for="hs-at-with-checkboxes-1" class="flex">
                    <input
                        type="checkbox"
                        class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                        id="hs-at-with-checkboxes-1"
                    />
                    <span class="sr-only">Checkbox</span>
                </label>
            </div> -->
        </td>

        <td class="text-start whitespace-nowrap text-gray-500">
            <div class="py-3 ps-6 lg:ps-3 pe-6">
                <div class="flex items-center gap-x-3">
                    <!-- <img
                        class="inline-block size-[38px] rounded-full"
                        :src="{{ value(findColumn("picture")) }}"
                        alt="picture"
                    /> -->
                    <div class="grow">
                        <span
                            class="block lg:whitespace-nowrap font-semibold text-gray-800 dark:text-gray-200"
                        >
                            {{ value(findColumn("name")) }}
                        </span>
                        <!-- <span class="block text-sm text-gray-500">
                            {{ value(findColumn("email")) }}
                        </span> -->
                    </div>
                </div>
            </div>
        </td>
        <td class="whitespace-nowrap text-gray-500">
            <div class="px-6 py-3 text-center">
                {{ value(findColumn("polling_stations")) }}
            </div>
        </td>

        <td class="whitespace-nowrap text-gray-500">
            <div class="px-6 py-3">
                {{ value(findColumn("added_on")) }}
            </div>
        </td>
    </tr>
</template>
