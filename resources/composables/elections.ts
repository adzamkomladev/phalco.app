import { defaultElectionStages } from "@/data/elections/create";

export default function useElections() {
    const getDefaultStages = () => defaultElectionStages;

    return {
        getDefaultStages
    };
}
