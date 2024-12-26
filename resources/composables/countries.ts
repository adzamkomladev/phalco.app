import axios from "axios"

export default function useCountries() {
    const getCountry = async (code: string): Promise<App.Data.CountryData | null> => {
        try {
            const response = await axios.get(route("common.countries", { filter: code }));

            const [country] = response.data?.countries;
            return country;
        } catch (error) {
            console.error(error);
            return null;
        }
    };

    const getCountries = async (): Promise<App.Data.CountryData[]> => {
        try {
            const response = await axios.get(route("common.countries"));

            return response.data?.countries;
        } catch (error) {
            console.error(error);
            return [];
        }
    };

    return {
        getCountry,
        getCountries
    };
}
