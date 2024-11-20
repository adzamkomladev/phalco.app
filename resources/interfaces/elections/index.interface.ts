export interface ElectionsStatsCardProps {
    title: string;
    prevValue: number;
    curValue: number;
    toolkit?: string;
    icon: string;
}

export interface ElectionsStatsCardSmallProps {
    description: string;
    value: string;
    icon: string;
}
export interface ElectionsStatsCardCompleteProps {
    numberOfVoters:string;
    daysLeft:number; //have to ask how this is need
    completionValue:number;
}



