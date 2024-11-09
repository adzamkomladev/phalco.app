<script setup lang="ts">
const props = defineProps<{
    invitations: App.Data.Settings.Team.InvitationData[];
    roles: App.Data.Settings.Team.RoleData[];
}>();

const showInviteForm = ref(false);
</script>

<template>
    <SharedCommonOverlay
        title="Invitations"
        subtitle=""
        description="Manage and send organization invites"
        useSheet
        outerClass=""
        OverlayClass="h-4"
    >
        <div class="grid gap-y-8 overflow-x-hidden overflow-y-auto">
            <div>
                <SettingsTeamInvitationTable :invites="invitations" />
            </div>

            <div class="flex font-medium items-center text-primary-300">
                <router-link
                    class="w-fit text-primary-300 gap-2 flex items-center rounded-lg p-2 text-base border-2 border-primary-400"
                >
                    Send Link<SharedCommonIcon name="link" class="size-5" />
                </router-link>

                <div class="ml-20">
                    <button
                        @click="showInviteForm = !showInviteForm"
                        class="text-base"
                    >
                        {{
                            showInviteForm
                                ? "Close Invitation Form"
                                : "Send Invite"
                        }}
                    </button>
                </div>
            </div>

            <div>
                <Transition>
                    <SettingsTeamInvitationForm
                        v-if="showInviteForm"
                        :roles="roles"
                    />
                </Transition>
            </div>
        </div>
    </SharedCommonOverlay>
</template>

<style scoped>
.v-enter-active,
.v-leave-active {
    transition: opacity 0.8s ease;
}
.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
