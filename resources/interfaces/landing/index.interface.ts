export interface ServiceItemProps{
        title: string;
        description: string;
        icon: { name: string; color: string };
}

export interface PricingCardProps {
    data: {
        type: string;
        amount: { value: number; rate: string };
        description: string;
        offers: string[];
    };
    buttonClass?: string;
    position: number;
}