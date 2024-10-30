<script setup lang="ts">
const props = defineProps<{
    invitations: App.Data.Settings.Team.InvitationData[];
    roles: App.Data.Settings.Team.RoleData[];
}>();

const isOpen = ref(false);

const InvitationForm = ref(null)

const loadInvitationForm =()=>{
    if(!InvitationForm.value){
 InvitationForm.value =defineAsyncComponent({       
    delay: 20000,
    loader:()=>import('~/resources/components/settings/team/invitation/form.vue'),
//    loadingComponent: LoadingComponent,
//   errorComponent: ErrorComponent,
//   timeout: 3000
}

)
}
}
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
        <div class="grid gap-y-8  overflow-x-hidden overflow-y-auto">
            <div class="">
                <SettingsTeamInvitationTable :data="props.invitations" />
            </div>
               
               
                    <div class="flex font-medium items-center text-primary-300">
                       <router-link
                    class="w-fit text-primary-300 gap-2 flex items-center rounded-lg p-2 text-base border-2 border-primary-400"
                >
                    Send Link<SharedCommonIcon name="link" class="size-5" />
                </router-link>  
                
                
                <div class="ml-20"><button
                        @click="loadInvitationForm"
                        :class="['']"
                        class="text-base "
                    >
                Send Invite 
                    </button></div>
                    </div>     
                      
        <invitation-form :roles="props.roles" />
           
        </div>
    </SharedCommonOverlay>
</template>