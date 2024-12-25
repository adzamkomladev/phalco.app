<script setup lang="ts">
import { ref, onMounted } from 'vue';

onMounted(() => {
    window.HSStaticMethods.autoInit();
});
const countries = ref<{ code: string; name: string }[]>([]);


// onMounted(async () => {
//   try {
//     const response = await fetch('https://flagcdn.com/en/codes.json');
//     const data = await response.json();

//     countries.value = Object.entries(data).map(([key, value]) => ({
//       code: key,
//       name: value,
//     }));

    
//   } catch (error) {
//     console.error('Failed to fetch country data:', error);
//   }finally{
//     window.HSStaticMethods.autoInit();
//   }
// });

const model =defineModel('GH');
</script>

<template>

<select 
v-model="model"
data-hs-select='{
  "hasSearch": true,
  "searchPlaceholder": "Search Country ",
  "searchClasses": "block w-full text-sm border-gray-200 rounded-lg focus:border-primary-500 focus:ring-primary-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
  "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
  "placeholder": "country",
  "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
  "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
  "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
  "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
  "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>",
  "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
}' class="hidden">
  <option  value="">Choose country ddd</option>
 <option value="AF" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/af.png\" alt=\"Afghanistan\" />"}'>
    Afghanistan
  </option>
  <option value="AX" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/ax.png\" alt=\"Aland Islands\" />"}'>
    Aland Islands
  </option>
  <option value="AL" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/al.png\" alt=\"Albania\" />"}'>
    Albania
  </option>
  <option value="DZ" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/dz.png\" alt=\"Algeria\" />"}'>
    Algeria
  </option>
  <option value="AS" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/as.png\" alt=\"American Samoa\" />"}'>
    American Samoa
  </option>
  <option value="AD" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/ad.png\" alt=\"Andorra\" />"}'>
    Andorra
  </option>
  <option value="AO" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/ao.png\" alt=\"Angola\" />"}'>
    Angola
  </option>
  <option value="AI" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/ai.png\" alt=\"Anguilla\" />"}'>
    Anguilla
  </option>
  <option value="AG" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/ag.png\" alt=\"Antigua and Barbuda\" />"}'>
    Antigua and Barbuda
  </option>
  <option value="AR" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/ar.png\" alt=\"Argentina\" />"}'>
    Argentina
  </option>
  <option value="AM" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/am.png\" alt=\"Armenia\" />"}'>
    Armenia
  </option>
  <option value="AW" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/aw.png\" alt=\"Aruba\" />"}'>
    Aruba
  </option>
  <option value="AU" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/au.png\" alt=\"Australia\" />"}'>
    Australia
  </option>
  <option value="AT" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/at.png\" alt=\"Austria\" />"}'>
    Austria
  </option>
  <option value="AZ" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/az.png\" alt=\"Azerbaijan\" />"}'>
    Azerbaijan
  </option>
  <option value="BS" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/bs.png\" alt=\"Bahamas\" />"}'>
    Bahamas
  </option>
  <option value="BH" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/bh.png\" alt=\"Bahrain\" />"}'>
    Bahrain
  </option>
  <option value="BD" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/bd.png\" alt=\"Bangladesh\" />"}'>
    Bangladesh
  </option>
  <option value="BB" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/bb.png\" alt=\"Barbados\" />"}'>
    Barbados
  </option>
  <option value="BY" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/by.png\" alt=\"Belarus\" />"}'>
    Belarus
  </option>
  <option value="BE" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/be.png\" alt=\"Belgium\" />"}'>
    Belgium
  </option>
  <option value="BZ" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/bz.png\" alt=\"Belize\" />"}'>
    Belize
  </option>
  <option value="BJ" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/bj.png\" alt=\"Benin\" />"}'>
    Benin
  </option>
  <option value="BM" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/bm.png\" alt=\"Bermuda\" />"}'>
    Bermuda
  </option>
  <option value="BT" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/bt.png\" alt=\"Bhutan\" />"}'>
    Bhutan
  </option>
  <option value="BO" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/bo.png\" alt=\"Bolivia\" />"}'>
    Bolivia
  </option>
  <option value="BA" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/ba.png\" alt=\"Bosnia and Herzegovina\" />"}'>
    Bosnia and Herzegovina
  </option>
  <option value="BW" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/bw.png\" alt=\"Botswana\" />"}'>
    Botswana
  </option>
  <option value="BR" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/br.png\" alt=\"Brazil\" />"}'>
    Brazil
  </option>
  <option value="BN" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/bn.png\" alt=\"Brunei\" />"}'>
    Brunei
  </option>
  <option value="BG" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/bg.png\" alt=\"Bulgaria\" />"}'>
    Bulgaria
  </option>
  <option value="BF" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/bf.png\" alt=\"Burkina Faso\" />"}'>
    Burkina Faso
  </option>
  <option value="BI" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/bi.png\" alt=\"Burundi\" />"}'>
    Burundi
  </option>
  <option value="KH" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/kh.png\" alt=\"Cambodia\" />"}'>
    Cambodia
  </option>
  <option value="CM" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/cm.png\" alt=\"Cameroon\" />"}'>
    Cameroon
  </option>
  <option value="CA" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/ca.png\" alt=\"Canada\" />"}'>
    Canada
  </option>
  <option value="Cape Verde" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/cv.png\" alt=\"Cape Verde\" />"}'>
    Cape Verde
  </option>
<option  value="GH" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/gh.png\" alt=\"Ghana\" />"}'>
    Ghana
</option>
<option value="CI" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/ci.png\" alt=\"Ivory Coast\" />"}'>
    Ivory Coast
</option>
<option value="BF" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/bf.png\" alt=\"Burkina Faso\" />"}'>
    Burkina Faso
</option>
<option value="Togo" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/tg.png\" alt=\"Togo\" />"}'>
    Togo
</option>

<option value="BJ" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/bj.png\" alt=\"Benin\" />"}'>
    Benin
</option>
<option value="Cameroon" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/cm.png\" alt=\"Cameroon\" />"}'>
    Cameroon
</option>
<option value="Chad" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/td.png\" alt=\"Chad\" />"}'>
    Chad
</option>
<option value="Niger" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/ne.png\" alt=\"Niger\" />"}'>
    Niger
</option>
<option value="United Kingdom" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/gb.png\" alt=\"United Kingdom\" />"}'>
    United Kingdom
</option>
<option value="United States" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/us.png\" alt=\"United States\" />"}'>
    United States
</option>
<option value="Germany" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/de.png\" alt=\"Germany\" />"}'>
    Germany
</option>
<option value="France" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/fr.png\" alt=\"France\" />"}'>
    France
</option>
<option value="Italy" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/it.png\" alt=\"Italy\" />"}'>
    Italy
</option>
<option value="Nigeria" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/ng.png\" alt=\"Nigeria\" />"}'>
    Nigeria
</option>
<option value=" South Africa" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/za.png\" alt=\"South Africa\" />"}'>
    South Africa
</option>
<option value="IN" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/in.png\" alt=\"India\" />"}'>
    India
</option>
<option value="China" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/cn.png\" alt=\"China\" />"}'>
    China
</option>
<option value="Kenya" data-hs-select-option='{
    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"https://flagcdn.com/w320/ke.png\" alt=\"Kenya\" />"}'>
    Kenya
</option>


</select>

</template>
