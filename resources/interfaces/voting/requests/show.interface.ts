import { RequestStatusType } from "../../shared/common.interface";

export interface VoteRequestResponseProps {
    requestedAt: Date;
    optionName: string;
    status: RequestStatusType;
}

export interface VoteRequestresult {
    ballotName: string;
    optionsResult: VoteRequestOption[]; 
}

export interface VoteRequestOption {
    optionfirstName: string;
    optionLastName: string;
    optionParty: string;
    optionVoteCount: number;
    optionPosition: number;
}

export interface ImageItemProp {
    src: string;
    description: string;
}