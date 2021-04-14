var counter = 0;

function upload_progress(num, max)
{
    counter += num;
    if (counter > max) counter = 0;
    if (counter < 0) counter = 0;
    print_progress(max);
}

function print_progress(max)
{
    $("#zdrowas_bar")
    .css("width", counter/max * 100 + "%")
    .text(counter + "/" + max);
}