<script setup lang="ts">
const props = defineProps<{ invitee: App.Data.Settings.Team.InvitationData }>();
</script>

<template>
    <tr class="group cursor-pointer hover:bg-gray-50">
        <td class="py-3 sm:pr-4 whitespace-nowrap">
            <div class="flex items-center gap-x-3">
                <img
                    class="w-10 h-10 rounded-full"
                    :src="invitee.picture"
                    @error="
                        (e) => {
                            if (e.target)
                                (e.target as HTMLImageElement).src =
                                    `https://ui-avatars.com/api/?name=${invitee.email}`;
                        }
                    "
                    alt="Avatar"
                />
                <div class="font-medium">
                    <span class="block text-sm text-black dark:text-gray-200">
                        {{ invitee.email }}
                    </span>
                    <span class="block text-sm text-gray-400 capitalize">
                        {{ invitee.role?.name }}
                    </span>
                </div>
            </div>
        </td>

        <td
            class="sm:px-6 py-4 whitespace-nowrap text-sm font-medium flex text-gray-700 opacity-0 group-hover:opacity-100 transition-all items-center gap-x-3"
        >
            <router-link
                :href="route('settings.team.invitation.send')"
                method="POST"
                :data="{
                    email: invitee.email,
                    role: invitee.role,
                }"
                class="hover:text-primary-300 group/reload p-1"
            >
                <SharedCommonIcon
                    name="reload"
                    class="group-hover/reload:scale-125 transition-all"
                />
            </router-link>
            <router-link
                :href="
                    route('settings.team.invitation.delete', { id: invitee.id })
                "
                method="DELETE"
                class="hover:text-red-500 p-1 rounded-md group/cancel"
            >
                <SharedCommonIcon
                    name="close"
                    class="group-hover/cancel:scale-125 transition-all"
                />
            </router-link>
        </td>

        <!-- Status Column -->
        <td
            :class="
                invitee.status === 'expired'
                    ? 'text-[#D8824C]'
                    : 'text-[#F5190B]'
            "
            class="sm:px-6 text-sm font-medium text-gray-500 capitalize text-right"
        >
            <span class="">
                {{ invitee.status }}
            </span>
        </td>
    </tr>
</template>
