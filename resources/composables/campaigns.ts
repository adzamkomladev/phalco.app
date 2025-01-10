import axios from "axios"

export default function useCampaigns() {
    const getSmsCount = async (message: string): Promise<{ smsCount: number } | null> => {
        try {
            const response = await axios.post(route("campaigns.sms.count"), { message });

            return response.data;
        } catch (error) {
            console.error(error);
            return null;
        }
    };

    const getCost = async (audienceId: number, message: string): Promise<App.Data.Campaigns.Sms.CostData | null> => {
        try {
            const response = await axios.post(route("campaigns.sms.cost"), { audience_id: audienceId, message });

            return response.data;
        } catch (error) {
            console.error(error);
            return null;
        }
    };

    return {
        getSmsCount,
        getCost
    };
}
