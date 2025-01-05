export interface ProgressBarProps {
    total: number;
    progress: number;
    width?: string;
    height?: string;
    loadedClass?: string | string[];
    unloadedClass?: string | string[];
    title?: string;
    color?: string;
    index?: number;
    hideCountProgress?: boolean;
}

export interface Sheet {
    title?: string;
    description?: string;
    pageImage?: string;
}

export interface DropDown {
    position?: positionType;
    hideContentOnSelect?: boolean;
    buttonClass?: string;
    dialogClass?: string;
}

export interface StatsCardProps {
    description: string;
    value: string | number;
    icon?: string;
}

export interface SpeechBubbleProps {
    sender?: {
        name: string;
        logo: string;
    };
    message?: {
        text: string;
        time: string;
    };
}


export interface UserProp {
    candidateFirstName?: string;
    candidateSecondName?: string;
    candidateName?: string;
    candidatePicture: string;
}

export interface PartyProp {
    partyNameFull?: string;
    partyNameAbrev?: string;
    partyLogo: string;
}

export type positionType = "top-right" | "top-left" | "top-center" | "bottom-right" | "bottom-left" | "bottom-center";
export type RequestStatusType = "Accepted" | "Rejected" | "Pending";

export interface EventProps {
    id: number;
    title: string;
    progress: number;
    total: number;
    status: 'paused' | 'uploading' | 'completed' | 'failed';
    url: string;
}

export interface Option {
    label: string;
    value: any;
}
