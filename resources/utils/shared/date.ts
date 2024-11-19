export const formatDate =(
    dateInput: Date | string,
    format: string = "dd/mm/yyyy",
): string=> {
    const date = dateInput instanceof Date ? dateInput : new Date(dateInput);

    // Check if `date` is valid
    if (isNaN(date.getTime())) {
        throw new Error("Invalid date format");
    }

    const day = String(date.getDate()).padStart(2, "0");
    const monthNumeric = String(date.getMonth() + 1).padStart(2, "0"); // Months are 0-indexed
    const year = String(date.getFullYear());
    const yearShort = year.slice(-2); // Last two digits of the year

    const monthsShort = [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
    ];
    const monthsFull = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];
    const monthShort = monthsShort[date.getMonth()];
    const monthFull = monthsFull[date.getMonth()];

    const formatMap: { [key: string]: string } = {
        dd: day,
        mm: monthNumeric,
        MMM: monthShort,
        MMMM: monthFull,
        yy: yearShort,
        yyyy: year,
    };

    return format.replace(
        /dd|mm|MMM|MMMM|yy|yyyy/g,
        (token) => formatMap[token],
    );
}



export const secondsUntil=(futureDate: Date | string): number=> {
    const now = new Date();
    const targetDate =
        futureDate instanceof Date ? futureDate : new Date(futureDate);

    // Check if the target date is valid
    if (isNaN(targetDate.getTime())) {
        throw new Error("Invalid future date");
    }

    // Calculate the difference in milliseconds and convert to seconds

    const differenceInMilliseconds = targetDate.getTime() - now.getTime();
    const seconds = Math.floor(differenceInMilliseconds / 1000);

    if (seconds <=0){ return 0;}
    else {return seconds; }
}

