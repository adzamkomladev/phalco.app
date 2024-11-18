<script setup lang="ts">
import FastDecisionImage from "~/resources/svg/welcome/fast_declision.webp?url";
import CampaigningImage from "~/resources/svg/welcome/campaigning.webp?url";
import VotingImage from "~/resources/svg/welcome/voting.webp?url";
import ManagementImage from "~/resources/svg/welcome/management.webp?url";
</script>

<template>
    <section
        id="service"
        class="bg-white py-8 flex flex-col gap-8 place-content-center scroll-mt-20"
    >
        <div class="flex px-[8%] flex-col text-center gap-2 py-4">
            <p
                v-motion-fade-visible
                :duration="300"
                :delay="90"
                class="font-black font-sans text-3xl md:text-4xl"
            >
                Our Service
            </p>
            <span
                v-motion-fade-visible
                :duration="360"
                :delay="90"
                class="text-gray-700 block self-center md:text-center lg:w-[50rem] text-balance"
            >
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore
            </span>
        </div>

        <div class="grid">
            <div class="grid items-center sm:grid-cols-2">
                <div class="px-[20%]">
                    <img :src="FastDecisionImage" class="" />
                </div>
                <div>
                    <p
                        v-motion-fade-visible
                        :duration="300"
                        :delay="90"
                        class="font-black font-sans text-3xl md:text-4xl pb-4"
                    >
                        Fast Decisions
                    </p>
                    <p
                        v-motion-fade-visible
                        :duration="360"
                        :delay="90"
                        class="text-gray-700 block self-center sm:pr-[20%] text-justify"
                    >
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore
                        Nisi architecto cupiditate aspernatur, laudantium sunt
                        tempora ullam eaque impedit iste. Quia minus eum
                        excepturi, labore nemo commodi officia magni possimus
                        eligendi.
                    </p>
                    <routerlink
                        class="text-secondary-500 group flex items-center gap-2 my-4"
                    >
                        <span class="text-base font-semibold">Learn More</span>
                        <SharedCommonIcon
                            name="arrow_farward"
                            class="transition-all group:hover:transition-y-5 h-4"
                        />
                    </routerlink>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.grid-container {
    display: grid;
    grid-auto-flow: column; /* Lay items in columns */
}
</style>
