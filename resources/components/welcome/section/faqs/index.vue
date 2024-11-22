<script setup lang="ts">
import {FAQ} from '~/resources/interfaces/welcome/index.interface'

const FAQs: FAQ[] = [
  {
    question: "What is an electronic election system?",
    answer: "An electronic election system allows voters to cast their ballots digitally, either through electronic voting machines or online platforms. It aims to streamline the voting process, reduce human error, and provide quicker results."
  },
  {
    question: "How secure is the electronic election system?",
    answer: "Electronic election systems employ various security measures such as encryption, multi-factor authentication, and secure servers to protect voter data. However, ongoing vigilance, regular audits, and updates are necessary to ensure system integrity."
  },
 
  {
    question: "How are electronic votes counted?",
    answer: "After a voter casts their vote electronically, the system automatically records and stores it in a secure database. The votes are then counted by the system and reported to the election authorities. Results can be monitored in real-time depending on the system’s configuration."
  },

  {
    question: "Are my votes anonymous in an electronic election?",
    answer: "Yes, the system is designed to ensure voter anonymity. Personal details are kept separate from the actual votes to maintain privacy and prevent any possible identification of individual voters."
  },
  {
    question: "How do I know my vote has been counted?",
    answer: "Many electronic voting systems provide a confirmation message or receipt after you cast your vote. If you’re voting in person, you may also receive a printed record of your vote to confirm your selection."
  },
 
  {
    question: "Can I vote multiple times in an electronic election?",
    answer: "No, each voter can only vote once. Electronic systems are designed to prevent duplicate voting, either by tracking IP addresses, using unique voter identification, or requiring multi-factor authentication."
  },
 
];


import StarImage from "~/resources/svg/welcome/faq_star.svg?url";
import CoilImage from "~/resources/svg/welcome/faq_coil.svg?url";
import FaqsImage from "~/resources/svg/welcome/faqs.webp?url";

</script>

<template>
    <section
        id="recomendations"
        class="bg-white py-8 _sm:px-[8%] scroll-mt-20 "
    >
        <div class="flex  px-[8%] relative flex-col text-center gap-2 py-8 overflow-hidden">
            <img
                class="_sm:hidden absolute -right-[10%] bottom-5"
             :src="CoilImage"
            />
            <img
                class="absolute left-10 bottom-1/2 _sm:hidden"
                :src="StarImage"
            />
           
            <p
                v-motion-fade-visible
                :duration="300"
                :delay="90"
                class="font-black font-sans text-3xl md:text-4xl"
            >
                FAQ'S
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
        <div class="grid sm:grid-cols-9 gap-5 relative">
            <div class="sm:col-span-4">
                <img :src="FaqsImage" />
            </div>
            <div class="sm:col-span-5">
            <p class="font-black font-sans text-2xl md:text-3xl">Frequently Asked Questions</p>
   <div class="grid gap-2 text-sm ">
    <div v-for="(faq ,index) in FAQs" :key="index">
         <WelcomeSectionFaqsFaq
   
    :faq="faq"
   />
   <hr class="bg-slate-300 h-[2px] sm:w-[80%]"/>
    </div>
          <img
                class="absolute left-10 bottom-0 w-[10vw] _sm:hidden"
                :src="CoilImage"
            />    
   </div>
  
            
            </div>
 
        
        </div>
       
    </section>
</template>

<style scoped></style>
