<script setup lang="ts">
const props = defineProps<{ role: App.Data.Settings.Team.RoleData }>();
const status = ref(props.role.status);
status.value = "Active";
</script>

<template>
    <tr>
        <td
            class="whitespace-nowrap px-6 py-4 sm:ps-8  capitalize text-base"
        >
            {{ role.name }}
        </td>
        <td
            class="px-6  py-4 _sm:px-3  whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"
        >
            <span
                :class="
                    status.toLowerCase() === 'active'
                        ? 'bg-forest-200 text-forest'
                        : 'bg-crimson-200 text-crimson'
                "
                class="px-2 py-1 inline-flex items-center gap-x-1 text-xs font-medium rounded-full "
            >
                <SharedCommonIcon
                    v-if="status.toLowerCase() === 'active'"
                    name="check"
                    class="size-4 rounded-full text-white p-[2px] bg-forest"
                />
                <SharedCommonIcon
                    v-else
                    name="close"
                    class="text-white rounded-full bg-crimson"
                />
                
                {{ status }}
            </span>
        </td>
        <td
            class="px-6 _sm:px-4 py-4 sm:pe-8 whitespace-nowrap text-end font-medium flex items-center gap-x-2"
        >
            <SharedFormBaseSwitch />
        </td>
    </tr>
</template>
