<script setup lang="ts">

import NoOrganization from '~/resources/svg/organization/no_data.svg?url'

useHead({
    title: "Select an Organization",
});
const props = defineProps<{
    organizations: App.Data.Organizations.OrganizationData[];
}>();
const organizations = props.organizations.map((o) => ({
    id: o.id!,
    name: o.name!,
    logo:o.logo!,
}));

const isEmpty = computed(() => organizations.length == 0);

const organization = ref<number | null>(null);
const loading = ref(false);

watch(
    organization,
    async (newOrganization: number | null, _: number | null) => {
        if (newOrganization) {
            loading.value = true;
            try {
                const res = await router.patch(route("organizations.select"), {
                    data: { organization_id: +newOrganization },
                });
            } catch (error) {
            } finally {
                loading.value = false;
            }
        }
    },
);
</script>

<template layout="organization">
      <LayoutOrganisatonContent 
      :subtitle="isEmpty ?'No organisation yet !':'Select an Organisation'" 
      :description="isEmpty? 'Create new organiation and manage team':'Invite and manage members'">


            <div class="mt-8">
        
                <div v-if="!isEmpty" class="flex flex-col gap-5">
                <OrganisationSelectButton  
                 @select="organization = $event"
                :loading="loading"
                v-model="organization" 
                v-for="(organisation,index) in organizations" :key="index"  :organization="organisation" />
           
           <div class="pb-5">
    <SharedCommonOr/>
</div>
            </div>

<div class="">

</div>

    <div v-if="isEmpty" class="pb-4 grid justify-center dark:opacity-70">
         
        <img
                :src="NoOrganization"
                class="w-[24vw] portrait:w-[45vw] max-w-72 h-[24vw] portrait:h-[45vw] max-h-72"
            />
        </div>         
                <router-link
                    :href="route('organizations.create')"
                    class="text-primary-500 items-center text-xl w-fit justify-self-center gap-5 font-medium flex h-fit"
                :class="isEmpty && 'w-full text-2xl'"
                   
                >
                         <span
                                    :class="isEmpty && 'text-primary-500'"

                         class="text-3xl size-12 leading-[0px]  font-semibold rounded-full bg-gray-100 text-gray-700  flex items-center justify-center" >+</span>

                  <span 

                  class="">Create New Organization</span>   
                </router-link>
                    </div>
         
      </LayoutOrganisatonContent>

       
</template>
