<script setup lang="ts">
const props = defineProps<{
    invitations: App.Data.Settings.Team.InvitationData[];
    roles: App.Data.Settings.Team.RoleData[];
}>();

const isOpen = ref(false);
</script>

<template>
    <SharedCommonOverlay
        title="Invitations"
        subtitle="Pending Invites"
        description="Invite and manage members"
        useSheet
        outerClass=""
        OverlayClass="h-4 "
    >
        <div class="grid gap-y-8">
            <SharedAnimationCollapsible>
                <template v-slot:summary>
                    <button
                        @click="isOpen = !isOpen"
                        :class="[isOpen ? 'rounded-t-xl' : 'rounded-full']"
                        class="flex justify-between px-6 py-2 transition-all w-full border-gray-200"
                    >
                        <p class="flex text-gray-500">
                            <SharedCommonIcon
                                name="invitation"
                                class="self-center"
                            />
                            <span>
                                {{ isOpen ? "close" : "open" }} invitation
                                Status</span
                            >
                        </p>
                        <SharedCommonIcon
                            :class="[
                                'h-4 self-center transition-transform duration-500 ',
                                isOpen ? 'rotate-180' : '',
                            ]"
                            name="chevron"
                        />
                    </button>
                </template>

                <SettingsTeamInvitationTable :data="props.invitations" />
            </SharedAnimationCollapsible>
            <div class="text-primary-400 flex gap-4 items-center">
                <router-link
                    class="w-fit flex rounded-lg p-2 text-base border border-primary-400"
                >
                    Send Link<SharedCommonIcon name="link" class="size-5" />
                </router-link>
                <router-link>Invite and manage members</router-link>
            </div>
            <SettingsTeamInvitationForm :roles="props.roles" />
        </div>
    </SharedCommonOverlay>
</template>
<style scoped>
summary {
    padding-inline: 0.5rem;
    cursor: pointer;
}

.details::details-content {
    display: block;
    margin-inline: 2rem;
    block-size: 0;
    transition-property: block-size, content-visibility;
    transition-duration: 0.5s;
    transition-behavior: allow-discrete;
}
.details[open]::details-content {
    block-size: auto;
    block-size: calc-size(auto);
}
</style>
