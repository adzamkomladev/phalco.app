<script setup lang="ts">
const props = defineProps<{ invitee: App.Data.Settings.Team.InvitationData }>();
const expired = computed(()=>{
    return new Date(props.invitee.expires_at).getTime() < Date.now();
}
 )
</script>

<template>
    <tr class="group transition-all  hover:bg-gray-50 pr-2 rounded-md"  >
        <td class=" sm:pr-4 whitespace-nowrap">
            <div class="flex items-center gap-x-3">
                <img
                    class="w-10 block shrink-0 h-10 rounded-full"
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
 class="sm:px-6 py-2 whitespace-nowrap text-sm font-medium flex text-gray-700 opacity-0 group-hover:opacity-100 transition-all group-hover:delay-150 items-center gap-x-3"
        >
        <abbr title="resend invitation">
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
        </abbr>
            <abbr title="cancel invitation" class="" >
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
            
                
            </router-link></abbr>
        </td>

        <!-- Status Column -->
        <td
            :class="
            invitee.declined ? 'text-[#F5190B]':
                expired
                    ? 'text-gray-400'
                    : 'text-[#D8824C]'
            "
            class="sm:px-6 text-sm font-medium capitalize text-right"
        >
            <span class="">
                {{invitee.declined ?'Declined': expired ?'Expired':'Pending' }} 
            </span>
        </td>
    </tr>
</template>
