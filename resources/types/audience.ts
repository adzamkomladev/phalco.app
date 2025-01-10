export type NotificationHandler = (event: {
    audienceId: number;
    notification: App.Data.Audiences.Show.NotificationData;
}) => void;
