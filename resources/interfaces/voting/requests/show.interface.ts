import { RequestStatusType } from "../../shared/common.interface";

export interface VoteRequestResponseProps {
    requestedAt: Date;
    optionName: string;
    status: RequestStatusType;
}
