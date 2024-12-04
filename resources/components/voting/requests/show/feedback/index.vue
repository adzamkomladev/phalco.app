<script setup lang="ts">
useHead({
    title: "Agents",
});

import { ImageItemProp } from "~/resources/interfaces/voting/requests/show.interface";
import { formatDate, secondsUntil } from "~/resources/utils/shared/date";

const currentPage = ref(
    localStorage.getItem("currentFeedbackPage") || "comments",
);

const feddbacksPages = ["comments", "images"];
const switchFeedbackPage = (name: string) => {
    localStorage.setItem("currentFeedbackPage", name);
    currentPage.value = name;
};

 const electionImages: ImageItemProp[] = [
    {
        src: "https://via.placeholder.com/150/0000FF/FFFFFF?text=Election+Result+1",
        description: "Voters casting their votes during the election."
    },
    {
        src: "https://via.placeholder.com/150/FF0000/FFFFFF?text=Election+Result+2",
        description: "Election officials counting the ballots."
    },
    {
        src: "https://via.placeholder.com/150/00FF00/FFFFFF?text=Election+Result+3",
        description: "A candidate giving a victory speech."
    },
    {
        src: "https://via.placeholder.com/150/FFFF00/FFFFFF?text=Election+Result+4",
        description: "A billboard displaying election results."
    }
];


</script>

<template>
    <div class="grid gap-4 py-10">
        <div class="">
            <div class="">
                <p class="text-base text-black mobile:text-sm font-semibold">
                    Election Feedback
                </p>
                <p class="text-black/50 text-xs">Lorem ipsum dolor sit amet</p>
            </div>
        

            <div class="w-full overflow-hidden">
  <div class=" mx-5 pt-4">
    <nav class="flex gap-x-4 text-sm" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
      <button type="button" class="hs-tab-active:font-semibold hs-tab-active:pointer-events-none  flex flex-col  hs-tab-active:text-primary-500 gap-2  px-1 inline-flex items- gap-x-2   whitespace-nowrap text-gray-500 hover:text-primary-600 focus:outline-none focus:text-primary-600 transitionss-all disabled:opacity-50 disabled:pointer-events-none active" id="basic-tabs-comments" aria-selected="true" data-hs-tab="#tabs-comments" aria-controls="tabs-comments" role="tab">
        comments
        <p class=" w-0 hs-tab-active:w-full trasition-all duration-500 border-b-[2px] -mb-[1px]  hs-tab-active:border-primary-400  block"></p>
      </button>
      <button type="button" class="hs-tab-active:font-semibold hs-tab-active:pointer-events-none  flex flex-col  hs-tab-active:text-primary-500 gap-2  px-1 inline-flex items-end gap-x-2  whitespace-nowrap text-gray-500 hover:text-primary-600 focus:outline-none focus:text-primary-600 transitionss-all disabled:opacity-50 disabled:pointer-events-none " id="basic-tabs-item-2" aria-selected="false" data-hs-tab="#tabs-images" aria-controls="tabs-images" role="tab">
        images
        <p class=" w-0 hs-tab-active:w-full place-self-right trasition-all duration-500 border-b-[2px] -mb-[1px]  hs-tab-active:border-primary-400  block"></p>
      </button>

    
    </nav>
  </div>

  <div class="mt-3 ">
 
                    <div  :duration="300" v-motion-slide-visible-left id="tabs-comments"  role="tabpanel" aria-labelledby="comments">
      <VotingRequestsShowFeedbackComment
                   
                />                      </div>
                    
                    <div  :duration="300" v-motion-slide-visible-right id="tabs-images" class="hidden " role="tabpanel" aria-labelledby="image">
                                      <VotingRequestsShowFeedbackGallary  :images="electionImages" />

                    </div>

    
  </div>
</div>
        </div>
    </div>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
