export interface ElectionStageProps {
    title: string;
    date:{
        start:Date |null;
        end: Date |null;

    }
}

export interface ElectionFormProps {
    name: string;
    logo: string;
    description: string;
    startDate: Date;
    endDate: Date;
    stages: ElectionStage[];
}
