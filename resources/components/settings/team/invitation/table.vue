<script setup lang="ts">
const props = defineProps<{
    data: App.Data.Settings.Team.InvitationData[];
}>();


const invites = [
  {
    id:1,
    email: "jane.doe@example.com",
    role: {name:"Admin"},
    picture: "https://randomuser.me/api/portraits/women/1.jpg",
    status: "pending",
  },
  {
        id:2,

    email: "john.smith@example.com",
    role: {name:"Agent"},
    picture: "https://randomuser.me/api/portraits/men/2.jpg",
    status: "expired",
  },
  {
        id:3,

    email: "alice.jones@example.com",
    role: {name:"Agent"},
    picture: "https://randomuser.me/api/portraits/wome/3.jpg",
    status: "pending",
  }
];

const flash = useProperty("flash");
</script>
<template>
    <div>
        <Transition name="fade">
            <div
                v-if="flash?.info"
                id="dismiss-alert"
                class="mb-3 hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-50 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500"
                role="alert"
                tabindex="-1"
                aria-labelledby="hs-dismiss-button-label"
            >
                <div class="flex">
                    <div class="shrink-0">
                        <svg
                            class="shrink-0 size-4 mt-0.5"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path
                                d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"
                            ></path>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
                    </div>
                    <div class="ms-2">
                        <h3
                            id="hs-dismiss-button-label"
                            class="text-sm font-medium"
                        >
                            {{ flash?.info }}
                        </h3>
                    </div>
                    <div class="ps-3 ms-auto">
                        <div class="-mx-1.5 -my-1.5">
                            <button
                                type="button"
                                class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:bg-teal-100 dark:bg-transparent dark:text-teal-600 dark:hover:bg-teal-800/50 dark:focus:bg-teal-800/50"
                                data-hs-remove-element="#dismiss-alert"
                            >
                                <span class="sr-only">Dismiss</span>
                                <svg
                                    class="shrink-0 size-4"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </Transition>
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 inline-block align-middle">
                    <div
                        class=" "
                    >
                        <table class="">
    <tbody>
        <tr
            v-for="invite in invites"
            :key="invite.id"
            class="group"
        >
            <td class="py-3 sm:pr-4 whitespace-nowrap">
                <div class="flex items-center gap-x-3">
                    <img
                        class="w-10 h-10 rounded-full"
                        :src="invite.picture"
                        @error="(e) => { if (e.target) (e.target as HTMLImageElement).src = `https://ui-avatars.com/api/?name=${invite.email}`; }"
                        alt="Avatar"
                    />
                    <div>
                        <span class="block text-sm text-gray-800 dark:text-gray-200">
                            {{ invite.email }}
                        </span>
                        <span class="block text-sm text-gray-500 capitalize">
                            {{ invite.role?.name }}
                        </span>
                    </div>
                </div>
            </td>
            
            <td class="sm:px-6 py-4 whitespace-nowrap text-sm font-medium flex  text-gray-700 opacity-0 group-hover:opacity-100 transition-all items-center gap-x-2">
                <router-link
                    :href="route('settings.team.invitation.send')"
                    
                    method="POST"
                    :data="{ email: invite.email, role: invite.role }"
                    class="hover:text-teal-500"
                >
                    <SharedCommonIcon name="reload" />
                </router-link>
                <router-link
                    :href="route('settings.team.invitation.delete', { id: invite.id })"
                    method="DELETE"
                    class="hover:text-red-500"
                >
                    <SharedCommonIcon name="close" />
                </router-link>
            </td>

            <!-- Status Column -->
            <td 
            :class="invite.status==='expired'?'text-orange-300':'text-orange-500'"
            class="sm:px-6 text-sm font-medium text-gray-500 capitalize text-right">
                <span class="">
                {{ invite.status }}
                </span>
            </td>
        </tr>
    </tbody>
</table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
