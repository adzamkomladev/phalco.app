export interface SelectedElectionDetailsCard {
    title: string;
    to?: string;
    icon: string;
    leftValue: number;
    leftLabel: string;
    rightValue: number;
    rightLabel: string;
}

export interface Election {
    id: number;
    organization_id: number;
    user_id: number;
    name: string;
    description: string;
    logo: string;
    status: 'active'|'inactive';
    stage: string;
    start: Date;
    end: Date;
    created_at: Date;
    updated_at: Date;
    voters_count: number;
    stages: Stage[];
    created_by: CreatedBy;
}

export interface CreatedBy {
    id: number;
    selected_organization_id: number;
    first_name: string;
    last_name: string;
    email: string;
    avatar: string;
    current_organization: CurrentOrganization;
}

export interface CurrentOrganization {
    id: number;
    user_id: number;
    name: string;
    description: string;
    logo: string;
    created_at: Date;
    updated_at: Date;
}

export interface Stage {
    id: number;
    election_id: number;
    stage: string;
    start: Date;
    end: Date;
}

export interface Stats {
    voters: Voters;
    nominations: Nominations;
    pollingStations: Campaigns;
    campaigns: Campaigns;
}

export interface Campaigns {
    total: number;
    active: number;
}

export interface Nominations {
    submitted: number;
    approved: number;
}

export interface Voters {
    total: number;
    voted: number;
}

export interface StageStatsDefault {
    totalBalance?: number;
    totalDonations?: number;
    totalNominations?: number;
    spent?: { [key: string]: number };
}

export interface StageStatsCampaigns {
    campaigns?: number;
    audiences?: number;
    message?: Message;
}

export interface Message {
    id: number;
    text: string;
    sender: string;
    sentBy: SentBy;
}

export interface SentBy {
    id: number;
    name: string;
    avatar: string;
}

export interface StageStatsNominations {
    total?: number;
    approved?: number;
    successful?: number;
    totalSpent?: number;
    pending?: number;
}

export interface StageStatsVoting {
    voters?: number;
    pollingStations?: number;
    ballots?: number;
    candidates?: number;
}


export type StageStats = StageStatsDefault | StageStatsCampaigns | StageStatsNominations | StageStatsVoting;
