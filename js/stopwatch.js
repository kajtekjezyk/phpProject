
var seconds = 0;
var minutes = 0;
var hours = 0;
var interval;


$(function() {
    $("#pause_button").prop("disabled", true);
    $("#stop_button").prop("disabled", true);

    $( "#start_button" ).on('click', function() {
        $("#start_button").prop("disabled", true);
        $("#pause_button, #stop_button").prop("disabled", false);
        $("#start_button").html("Start");
        interval = setInterval("update_stopwatch()", 1000);
    });

    $( "#pause_button" ).on('click', function() {
        $("#start_button").prop("disabled", false);
        $("#pause_button").prop("disabled", true);
        clearInterval(interval);
    });

    $( "#stop_button" ).on('click', function() {
        $("#start_button").prop("disabled", false);
        $("#pause_button, #stop_button").prop("disabled", true);
        clearInterval(interval);
        resset_stopwatch();
    });
});

function update_stopwatch()
{
    seconds++;
    if (seconds >= 60){ seconds = 0; minutes++;}
    if (minutes >= 60){ minutes = 0; hours ++;}
    print_timer();
}

function resset_stopwatch()
{
    seconds = minutes = hours = 0;
    $("#start_button").html("Restart");
    print_timer();
}

function add_zero_if_needed(value)
{
    if(value < 10) { return "0" + value; }
    else { return value; }
}

function print_timer()
{
    $("#clock").html(add_zero_if_needed(hours) + ":" + add_zero_if_needed(minutes) + ":" + add_zero_if_needed(seconds));
}

