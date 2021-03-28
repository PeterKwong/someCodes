export function  extraWorkingDates(extraDates,monthOrDate = ''){
    var extraDates = extraDates || 0
    var d = new Date()
    var data = {dates: [
                    'Sunday',
                    'Monday',
                    'Tuesday',
                    'Wednesday',
                    'Thursday',
                    'Friday',
                    'Saturday',
            ], months: [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December', ]} 
        

    d.setDate(d.getDate() + extraDates)
    
    if (monthOrDate == 'months') {
        return data[monthOrDate][d.getMonth()] 
    }
    if (monthOrDate == 'dates') {
        return data[monthOrDate][d.getDay()] 
    }

    if (monthOrDate == '') {
        return d.getDate()
    }

}