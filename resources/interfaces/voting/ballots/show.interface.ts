export interface Ballot {
    id: number;
    election_id: number;
    position: string;
    description: string;
    code: string;
    status: string;
    created_at: Date;
    updated_at: Date;
    options: Option[];
}

export interface Option {
    id: number;
    ballot_id: number;
    order: number;
    name: string;
    avatar: null;
    party: null;
    party_image: null;
}
