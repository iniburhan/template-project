
flatpickr('.flatpickr-no-config', {
    enableTime: true,
    dateFormat: "Y-m-d H:i", 
})
flatpickr('.flatpickr-always-open', {
    inline: true
})
flatpickr('.flatpickr-range', {
    dateFormat: "F j, Y", 
    mode: 'range'
})
flatpickr('.flatpickr-range-preloaded', {
    dateFormat: "F j, Y", 
    mode: 'range',
    defaultDate: ["2016-10-10T00:00:00Z", "2016-10-20T00:00:00Z"]
})
flatpickr('.flatpickr-time-picker-24h', {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    inline: true
})

// add
flatpickr('.flatpickr-basic', {
    enableTime: false,
    dateFormat: "Y-m-d", 
})
flatpickr('.flatpickr-month-select', 
{
    // enableTime: false,
    // dateFormat: "Y-m-d", 
    plugins: 
        new monthSelectPlugin({
          shorthand: true, //defaults to false
          dateFormat: "m.y", //defaults to "F Y"
          altFormat: "F Y", //defaults to "F Y"
          theme: "dark" // defaults to "light"
        })
    
});