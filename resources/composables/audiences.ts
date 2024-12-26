import { NotificationHandler } from "@/types/audience";

export default function useAudiences() {
    const setupNotifications = (
        notifications: App.Data.Audiences.Show.NotificationData[],
        handler: NotificationHandler) => {
        for (const notification of notifications) {
            window.EchoHub.private(notification.broadcastTopic).listen(
                "Audiences.ContactImported",
                handler,
            );
        }
    };

    return {
        setupNotifications
    };
}
