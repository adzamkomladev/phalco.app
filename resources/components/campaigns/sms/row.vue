<script setup lang="ts">
const props = defineProps<{
    row: { key: any; value: any; extra: any };
    columns: any[];
    findColumn: (label: string) => any;
}>();

const { key, value, extra } = props.row;
</script>

<template>
    <tr class="">
        <td class="size-px whitespace-nowrap">
            <!-- <div class="py-3 ps-6">
                                            <label
                                                for="hs-at-with-checkboxes-1"
                                                class="flex"
                                            >
                                                <input
                                                    type="checkbox"
                                                    class="text-primary-600 border-gray-300 rounded shrink-0 focus:ring-primary-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-600 dark:checked:bg-primary-500 dark:checked:border-primary-500 dark:focus:ring-offset-gray-800"
                                                    id="hs-at-with-checkboxes-1"
                                                />
                                                <span class="sr-only"
                                                    >Checkbox</span
                                                >
                                            </label>
                                        </div> -->
        </td>

        <td class="whitespace-nowrap">
            <div class="pr-6 py-3">
                <span
                    class="text-sm font-semibold text-gray-800 dark:text-gray-200"
                >
                    {{ value(findColumn("code")) }}
                </span>
            </div>
        </td>
        <td class="whitespace-nowrap w-fit">
            <div
                class="py-3 ps-6 lg:ps-3 xl:ps-0 pe-6 flex gap-2 items-center min-w-fit"
            >
                <div class="inline-block size-[38px]">
                    <img
                        class="block size-full rounded-full"
                        :src="extra(findColumn('created_by'), 'avatar')"
                        alt="Avatar"
                    />
                </div>

                <p class="text-sm text-gray-800 dark:text-gray-200">
                    {{ value(findColumn("created_by")) }}
                </p>
            </div>
        </td>
        <td class="  ">
            <SharedTableStatus :status="value(findColumn('status'))" />
        </td>
        <td class="size-px whitespace-nowrap">
            <div class="px-6 py-3">
                <spa class="text-sm text-gray-800 dark:text-gray-200"
                    >{{ value(findColumn("audience")) }}
                </spa>
            </div>
        </td>
        <td class="w-96">
            <div class="px-6 py-3">
                <p
                    class="text-sm truncate w-40 min-w-full text-gray-800 dark:text-gray-200"
                >
                    {{ value(findColumn("sender")) }}
                </p>
            </div>
        </td>
        <td class="size-px whitespace-nowrap">
            <div class="px-6 py-3">
                <span class="text-sm text-gray-800 dark:text-gray-200"
                    >{{ value(findColumn("created_at")) }}
                </span>
            </div>
        </td>
        <td class="size-px whitespace-nowrap">
            <div class="px-6 py-1.5">
                <router-link
                    :href="
                        route('campaigns.sms.show', {
                            id: +extra(findColumn('name'), 'id'),
                        })
                    "
                    class="inline-flex items-center text-sm font-medium text-primary-600 cursor-pointer gap-x-1 decoration-2 hover:underline dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                >
                    <SharedTableShowDetail />
                </router-link>
            </div>
        </td>
    </tr>
</template>
